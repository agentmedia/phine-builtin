<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;

use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Framework\System\Http\Request;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use App\Phine\Database\BuiltIn\ContentRegisterConfirm;
use Phine\Bundles\BuiltIn\Logic\Registration\Confirmer;
use Phine\Bundles\BuiltIn\Modules\Backend\RegisterConfirmForm;
use Phine\Framework\System\Date;
use App\Phine\Database\Core\MemberMembergroup;
use App\Phine\Database\BuiltIn\RegisterConfirmMembergroup;

class RegisterConfirm extends FrontendModule
{

    protected $isValid = false;

    /**
     * The confirmer
     * @var Confirmer
     */
    private $confirmer;

    /**
     *
     * @var ContentRegisterConfirm
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
        $this->confirm = ContentRegisterConfirm::Schema()->ByContent($this->Content());
        $this->confirmer = new Confirmer();
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
        $member = $this->confirmer->GetMember();
        $member->SetConfirmed(Date::Now());
        if ($this->confirm->GetActivate())
        {
            $member->SetActive(true);
        }
        $member->Save();
        $this->AddGroups($member);
        if ($this->confirm->GetSuccessUrl())
        {
            Response::Redirect(FrontendRouter::Url($this->confirm->GetSuccessUrl()));
        }
    }
    
    private function AddGroups($member)
    {
        //Clear groups (although none should exist...)
        $memMemGrps = MemberMembergroup::Schema()->FetchByMember(false, $member);
        foreach ($memMemGrps as $memMemGrp)
        {
            $memMemGrp->Delete();
        }
        $confGroups = RegisterConfirmMembergroup::Schema()->FetchByConfirm(false, $this->confirm);
        foreach ($confGroups as $confGroup)
        {
            $memMemGrp = new MemberMembergroup();
            $memMemGrp->SetMember($member);
            $memMemGrp->SetMemberGroup($confGroup->GetMemberGroup());
            $memMemGrp->Save();
        }
    }
    
    public function ContentForm()
    {
        return new RegisterConfirmForm();
    }
    
    public function AllowCustomTemplates()
    {
        return true;
    }

}
