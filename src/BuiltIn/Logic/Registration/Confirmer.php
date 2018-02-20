<?php

namespace Phine\Bundles\BuiltIn\Logic\Registration;
use App\Phine\Database\Core\Member;
use Phine\Framework\Validation\Validator;
use App\Phine\Database\Core\PageUrl;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
/* Helper class for member confirmation */
class Confirmer extends Validator
{
    /**
     * The confirming member
     * @var Member
     */
    private $member;
    
    const Failed= 'Confirmer.Failed';
    /**
     * 
     * @param string $errorLabelPrefix The error label prefix
     * @param string $trimValue
     */
    function __construct($errorLabelPrefix = '', $trimValue = true)
    {
        parent::__construct($errorLabelPrefix, $trimValue);
    }
    /**
     * Checks the confirm parameters
     * @param array $value An array with keys 'email' and 'key' containing the member mail and the validation key
     */
    public function Check($value)
    {
        if (!is_array($value) || !isset($value['email']) || !isset($value['key']))
        {
            $this->error = self::Failed;
        }
        $mail = $value['email'];
        $member = Member::Schema()->ByEMail($mail);
        if (!$member || $member->GetConfirmed()  ||
            $value['key'] !== self::CalcKey($member))
        {
            $this->error = self::Failed;
        }
        else
        {
            $this->member = $member;
        }
        return $this->error == '';
    }
    
    /**
     * Gets the full confirm url with calculated parameters
     * @param Member $member The member
     * @param PageUrl $confirmUrl The confirmation url
     * @return string Returns the url
     */
    public static function CalcUrl(Member $member, PageUrl $confirmUrl)
    {
        $params = array('email'=>$member->GetEMail(), 'key'=>self::CalcKey($member));
        return FrontendRouter::Url($confirmUrl, $params);
    }
    
    /**
     * Returns the member in case the check succeeded
     * @return Member Returns the validated member
     */
    public function GetMember()
    {
        return $this->member;
    }
    
    /**
     * Returns the password key
     * @param Member $member
     * @return string Returns the calculated key for the member
     */
    private static function CalcKey(Member $member)
    {
        return sha1($member->GetPasswordSalt() . $member->GetConfirmed() . $member->GetName());
    }

}

