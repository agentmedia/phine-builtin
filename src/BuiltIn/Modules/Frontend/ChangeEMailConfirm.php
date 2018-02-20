<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;

use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Framework\System\Http\Request;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use App\Phine\Database\BuiltIn\ContentChangeEmailConfirm;
use Phine\Bundles\BuiltIn\Logic\ChangeRequest\Confirmer;
use Phine\Bundles\BuiltIn\Modules\Backend\ChangeEMailConfirmForm;
use Phine\Bundles\Core\Logic\DBEnums\ChangeRequestPurpose;

class ChangeEMailConfirm extends FrontendModule
{

    protected $isValid = false;

    /**
     * The confirmer
     * @var Confirmer
     */
    private $confirmer;

    /**
     *
     * @var ContentChangeEmailConfirm
     */
    private $confirm;

    public function AllowChildren()
    {
        return false;
    }

    /**
     * Initializes the confirm element
     * @return boolean Returns true if redirect happens
     */
    protected function Init()
    {
        $this->confirm = ContentChangeEmailConfirm::Schema()->ByContent($this->Content());
        $this->confirmer = new Confirmer(ChangeRequestPurpose::NewEMail());
        $this->isValid = $this->confirmer->Check(Request::GetArray());
        if ($this->isValid)
        {
            $this->OnSuccess();
        }
        else if ($this->confirm->GetErrorUrl())
        {
            Response::Redirect(FrontendRouter::Url($this->confirm->GetErrorUrl()));
            return true;
        }
        return parent::Init();
    }

    private function OnSuccess()
    {
        $request = $this->confirmer->GetChangeRequest();
        $member = $request->GetMember();
        $member->SetEMail($request->GetNewValue());
        $member->Save();
        $request->Delete();
        if ($this->confirm->GetSuccessUrl())
        {
            Response::Redirect(FrontendRouter::Url($this->confirm->GetSuccessUrl()));
        }
    }
    
    public function ContentForm()
    {
        return new ChangeEMailConfirmForm();
    }
    
    public function AllowCustomTemplates()
    {
        return true;
    }

}
