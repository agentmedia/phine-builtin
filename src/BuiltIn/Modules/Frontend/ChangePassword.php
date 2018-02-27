<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;

use Phine\Bundles\Core\Logic\Module\FrontendForm;
use Phine\Bundles\BuiltIn\Modules\Backend\ChangePasswordForm;
use Phine\Framework\FormElements\Fields\Input;
use App\Phine\Database\Core\MemberChangeRequest;
use Phine\Framework\System\Date;
use Phine\Bundles\Core\Logic\DBEnums\ChangeRequestPurpose;
use App\Phine\Database\BuiltIn\ContentChangePassword;
use Phine\Bundles\BuiltIn\Logic\ChangeRequest\Confirmer;
use App\Phine\Database\Access;
use App\Phine\Database\Core\Member;
use Phine\Framework\Validation\DatabaseCount;
use Phine\Framework\System\Str;
use Phine\Framework\System\IO\Path;
use Phine\Bundles\Core\Logic\Util\PathUtil;
use Phine\Bundles\BuiltIn\Logic\HtmlTemplating\TemplateParser;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use PHPMailer\PHPMailer\PHPMailer;
class ChangePassword extends FrontendForm
{

    private $changePassword;

    protected function Init()
    {
 
        $this->changePassword = ContentChangePassword::Schema()->ByContent($this->Content());
        $this->AddNameField();
        $this->AddUniqueSubmit('ChangePasswordSubmit');
        return parent::Init();
    }

    private function AddNameField()
    {
        $name = 'Name';
        $this->AddField(Input::Text($name));
        $this->SetRequired($name);
        $this->AddValidator($name, $this->DBValidator());
    }
    
    private function DBValidator()
    {
        $sql = Access::SqlBuilder();
        $tblMember = Member::Schema()->Table();
        $where = $sql->Equals($tblMember->Field('Name'), $sql->Placeholder())
                ->Or_($sql->Equals($tblMember->Field('EMail'), $sql->Placeholder()));
        
        $what = $sql->SelectList($sql->FunctionCount(array($tblMember->Field('ID'))));
        $select = $sql->Select(false, $what, $tblMember, $where);
        $validator = DatabaseCount::UniqueExists($select);
        $validator->SetNumPlaceholders(2);
        return $validator;
    }

    protected function OnSuccess()
    {
        $changeRequest = new MemberChangeRequest();
        $member = Member::Schema()->ByEMail($this->Value('Name'));
        if (!$member) {
            $member = Member::Schema()->ByName($this->Value('Name'));
        }
        $changeRequest->SetMember($member);
        $changeRequest->SetMailSent(Date::Now());
        $changeRequest->SetPurpose((string) ChangeRequestPurpose::NewPassword());
        $changeRequest->SetNewValue('');
        $salt = Str::Start(md5(uniqid(microtime())), 16);
        $changeRequest->SetMailSalt($salt);
        $changeRequest->Save();
        $this->SendConfirmMail($changeRequest);
        if ($this->changePassword->GetNextUrl()){
            Response::Redirect(FrontendRouter::Url($this->changePassword->GetNextUrl()));
        }
    }

    private function SendConfirmMail(MemberChangeRequest $changeRequest)
    {
        $mailer = new PHPMailer(true);
        $mailer->From = $this->changePassword->GetMailFrom();
        $mailer->Subject = $this->changePassword->GetMailSubject();
        $mailer->addAddress($changeRequest->GetMember()->GetEMail());
        $mailer->msgHTML($this->GetConfirmMessage($changeRequest));
        $mailer->send();
    }

    private function GetConfirmMessage(MemberChangeRequest $changeRequest)
    {
        $replacements = array();
        $replacements['Text1'] = $this->changePassword->GetMailText1();
        $replacements['Text2'] = $this->changePassword->GetMailText2();
        $replacements['Title'] = Html($this->changePassword->GetMailSubject());
        $replacements['Styles'] = Html($this->changePassword->GetMailStyles());
        $confirmUrl = $this->changePassword->GetConfirmUrl();
        if ($confirmUrl) {
            $replacements['ConfirmUrl'] = Html(Confirmer::CalcUrl($changeRequest, $confirmUrl));
        }
        $template = Path::Combine(PathUtil::BundleFolder($this->MyBundle()), 'MailTemplates/Confirm.phtml');
        $parser = new TemplateParser($replacements);
        return $parser->Parse($template);
    }

    public function AllowChildren()
    {
        return false;
    }

    public function ContentForm()
    {
        return new ChangePasswordForm();
    }
    
    public function AllowCustomTemplates()
    {
        return true;
    }

}
