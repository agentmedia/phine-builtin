<?php

namespace Phine\Bundles\BuiltIn\Logic\ChangeRequest;

use Phine\Bundles\Core\Logic\Config\SettingsProxy;
use Phine\Framework\Validation\Validator;
use App\Phine\Database\Core\PageUrl;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use App\Phine\Database\Core\MemberChangeRequest;
use Phine\Bundles\Core\Logic\DBEnums\ChangeRequestPurpose;
use Phine\Framework\Validation\DatabaseCount;
use App\Phine\Database\Core\Member;

/* Helper class for email change confirmation */

class Confirmer extends Validator
{

    /**
     * The confirming member
     * @var MemberChangeRequest
     */
    private $request;

    /**
     *
     * @var ChangeRequestPurpose
     */
    private $purpose;

    const Failed = 'Confirmer.Failed';

    /**
     * 
     * @param ChangeRequestPurpose $purpose
     * @param string $errorLabelPrefix The error label prefix
     * @param string $trimValue True if value shall be trimmed
     */
    function __construct(ChangeRequestPurpose $purpose, $errorLabelPrefix = '', $trimValue = true)
    {
        $this->purpose = $purpose;
        parent::__construct($errorLabelPrefix, $trimValue);
    }

    /**
     * Checks the confirm parameters
     * @param array $value An array with keys 'changeRequest' and 'salt' containing the request id and the validation salt
     */
    public function Check($value)
    {
        if (!is_array($value) || !isset($value['changeRequest']) || !isset($value['salt'])) {
            $this->error = self::Failed;
        }
        $id = $value['changeRequest'];

        $request = MemberChangeRequest::Schema()->ById($id);
        if (!$request || $value['salt'] !== $request->GetMailSalt() || $request->GetPurpose() !== (string) $this->purpose) {
            $this->error = self::Failed;
        }
        else if ($this->IsOutdated($request)) {
            $request->Delete();
            $this->error = self::Failed;
        }
        else {
            $validator = DatabaseCount::NoneInTableField(Member::Schema(), 'EMail');
            if ($validator->Check($request->GetNewValue())) {
                $this->request = $request;
            }
            else {
                $this->error = self::Failed;
            }
        }
        return $this->error == '';
    }

    private function IsOutdated(MemberChangeRequest $request)
    {
        $outdate = $request->GetMailSent()->ToDateTime();
        $period = 'P' . SettingsProxy::Singleton()->Settings()->GetChangeRequestLifetime() . 'D';
        $outdate->add(new \DateInterval($period));
        return $outdate < new \DateTime('now');
    }

    /**
     * Gets the full confirm url with calculated parameters
     * @param MemberChangeRequest $request The member
     * @param PageUrl $confirmUrl The confirmation url
     * @return string Returns the url
     */
    public static function CalcUrl(MemberChangeRequest $request, PageUrl $confirmUrl)
    {
        $params = array('changeRequest' => $request->GetID(), 'salt' => $request->GetMailSalt());
        return FrontendRouter::Url($confirmUrl, $params);
    }

    /**
     * Returns the change request in case the check succeeded
     * @return MemberChangeRequest Returns the validated change request
     */
    public function GetChangeRequest()
    {
        return $this->request;
    }

}
