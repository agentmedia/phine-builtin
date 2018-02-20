<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;

use Phine\Bundles\Core\Logic\Module\FrontendForm;
use Phine\Framework\System\Http\Request;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use App\Phine\Database\BuiltIn\ContentChangePasswordConfirm;
use Phine\Bundles\BuiltIn\Logic\ChangeRequest\Confirmer;
use Phine\Bundles\BuiltIn\Modules\Backend\ChangePasswordConfirmForm;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\Validation\StringLength;
use Phine\Framework\Validation\CompareCheck;
use Phine\Framework\System\Str;
use Phine\Bundles\Core\Logic\DBEnums\ChangeRequestPurpose;

class ChangePasswordConfirm extends FrontendForm
{

    protected $isValid = false;
    protected $success = false;

    /**
     * The confirmer
     * @var Confirmer
     */
    private $confirmer;

    /**
     *
     * @var ContentChangePasswordConfirm
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
        $this->confirm = ContentChangePasswordConfirm::Schema()->ByContent($this->Content());
        $this->confirmer = new Confirmer(ChangeRequestPurpose::NewPassword());
        $this->isValid = $this->confirmer->Check(Request::GetArray());
        if (!$this->isValid && $this->confirm->GetErrorUrl()) {
            Response::Redirect(FrontendRouter::Url($this->confirm->GetErrorUrl()));
            return true;
        }
        $this->AddPasswordField();
        $this->AddPasswordRepeatField();
        $this->AddUniqueSubmit('PasswordChangeSubmit');
        return parent::Init();
    }

    private function AddPasswordField()
    {
        $name = 'Password';
        $this->AddField(Input::Password($name));
        $this->SetRequired($name);
        $this->AddValidator($name, StringLength::MinLength(5));
    }

    private function AddPasswordRepeatField()
    {
        $name = 'PasswordRepeat';
        $this->AddField(Input::Password($name));
        $this->SetRequired($name);
        $password = $this->Value('Password');
        if ($password) {
            $this->AddValidator($name, CompareCheck::Equals($password));
        }
    }

    protected function OnSuccess()
    {
        $request = $this->confirmer->GetChangeRequest();
        $member = $request->GetMember();
        $password = $this->Value('Password');
        $salt = Str::Start(md5(uniqid(microtime())), 8);
        $pwHash = hash('sha256', $password . $salt);
        $member->SetPassword($pwHash);
        $member->SetPasswordSalt($salt);
        $member->Save();
        $request->Delete();
        $this->success = true;
        if ($this->confirm->GetSuccessUrl()) {
            Response::Redirect(FrontendRouter::Url($this->confirm->GetSuccessUrl()));
        }
    }

    public function ContentForm()
    {
        return new ChangePasswordConfirmForm();
    }

    public function AllowCustomTemplates()
    {
        return true;
    }

}
