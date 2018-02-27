<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;

use Phine\Bundles\Core\Logic\Module\FrontendForm;
use Phine\Bundles\BuiltIn\Modules\Backend\ChangeEMailForm;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\Validation\PhpFilter;
use App\Phine\Database\Core\MemberChangeRequest;
use Phine\Framework\System\Date;
use Phine\Bundles\Core\Logic\DBEnums\ChangeRequestPurpose;
use App\Phine\Database\BuiltIn\ContentChangeEmail;
use Phine\Bundles\BuiltIn\Logic\ChangeRequest\Confirmer;
use Phine\Framework\System\IO\Path;
use Phine\Bundles\Core\Logic\Util\PathUtil;
use Phine\Bundles\BuiltIn\Logic\HtmlTemplating\TemplateParser;
use Phine\Framework\Validation\DatabaseCount;
use App\Phine\Database\Core\Member;
use Phine\Framework\System\Str;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use PHPMailer\PHPMailer\PHPMailer;

class ChangeEMail extends FrontendForm
{

    private $changeMail;

    protected function Init()
    {
        if (!self::Member()) {
            throw new \Exception(Trans('BuiltIn.ChangeEMail.Error.NotLoggedIn'));
        }
        $this->changeMail = ContentChangeEmail::Schema()->ByContent($this->Content());
        $this->AddNewEMailField();
        $this->AddUniqueSubmit('ChangeEMailSubmit');
        return parent::Init();
    }

    private function AddNewEMailField()
    {
        $name = 'NewEMail';
        $field = Input::Text($name);
        $field->SetHtmlAttribute('placeholder', self::Member()->GetEMail());
        $this->AddField($field);
        $this->SetRequired($name);
        $this->AddValidator($name, PhpFilter::EMail());
        $this->AddValidator($name, DatabaseCount::NoneInTableField(Member::Schema(), 'EMail'));
    }

    protected function OnSuccess()
    {
        $changeRequest = new MemberChangeRequest();
        $changeRequest->SetMember(self::Member());
        $changeRequest->SetMailSent(Date::Now());
        $changeRequest->SetPurpose((string) ChangeRequestPurpose::NewEMail());
        $changeRequest->SetNewValue($this->Value('NewEMail'));
        $salt = Str::Start(md5(uniqid(microtime())), 16);
        $changeRequest->SetMailSalt($salt);
        $changeRequest->Save();
        $this->SendConfirmMail($changeRequest);
        if ($this->changeMail->GetNextUrl()){
            Response::Redirect(FrontendRouter::Url($this->changeMail->GetNextUrl()));
        }
        
    }

    private function SendConfirmMail(MemberChangeRequest $changeRequest)
    {
        $mailer = new PHPMailer(true);
        $mailer->From = $this->changeMail->GetMailFrom();
        $mailer->Subject = $this->changeMail->GetMailSubject();
        $mailer->addAddress($this->Value('NewEMail'));
        $mailer->msgHTML($this->GetConfirmMessage($changeRequest));
        $mailer->send();
    }

    private function GetConfirmMessage(MemberChangeRequest $changeRequest)
    {
        $replacements = array();
        $replacements['Text1'] = $this->changeMail->GetMailText1();
        $replacements['Text2'] = $this->changeMail->GetMailText2();
        $replacements['Title'] = Html($this->changeMail->GetMailSubject());
        $replacements['Styles'] = Html($this->changeMail->GetMailStyles());
        $confirmUrl = $this->changeMail->GetConfirmUrl();
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
        return new ChangeEMailForm();
    }
    
    public function AllowCustomTemplates()
    {
        return true;
    }

}
