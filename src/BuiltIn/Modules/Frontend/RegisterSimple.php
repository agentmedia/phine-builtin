<?php
namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendForm;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\Validation\StringLength;
use Phine\Framework\Validation\PhpFilter;
use Phine\Database\BuiltIn\ContentRegisterSimple;
use Phine\Framework\Validation\DatabaseCount;
use Phine\Database\Core\Member;
use Phine\Framework\FormElements\Fields\Checkbox;
use Phine\Framework\System\String;
use Phine\Bundles\BuiltIn\Modules\Backend\RegisterSimpleForm;
use Phine\Framework\System\Date;
use Phine\Bundles\Core\Logic\Util\PathUtil;
use Phine\Framework\System\IO\Path;
use Phine\Bundles\BuiltIn\Logic\Registration\Confirmer;
use Phine\Bundles\BuiltIn\Logic\HtmlTemplating\TemplateParser;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
/**
 * The simple registration form
 */
class RegisterSimple extends FrontendForm
{
    /**
     * The member to register
     * @var Member
     */
    protected $member;
    /**
     * The register content
     * @var ContentRegisterSimple
     */
    protected $register;
    
    protected function Init()
    {
        $this->register = ContentRegisterSimple::Schema()->ByContent($this->Content());
        $this->AddNameField();
        $this->AddEMailField();
        $this->AddPasswordField();
        $this->AddTermsField();
        $this->AddUniqueSubmit('RegisterSubmit');
        return parent::Init();
    }
    
    private function AddNameField()
    {
        $name = 'Name';
        $field = Input::Text($name);
        $this->AddField($field);
        $this->SetRequired($name);
        $this->AddValidator($name, new StringLength(3, 32));
        $this->AddValidator($name, DatabaseCount::UniqueField(new Member(), 'Name'));
    }
    
    private function AddEMailField()
    {
        $name = 'EMail';
        $field = Input::Text($name);
        $this->AddField($field);
        $this->SetRequired($name);
        $this->AddValidator($name, PhpFilter::EMail());
        $this->AddValidator($name, DatabaseCount::UniqueField(new Member(), 'EMail'));
    }
    
    private function AddPasswordField()
    {
        $name = 'Password';
        $field = Input::Password($name);
        $this->AddField($field);
        $this->SetRequired($name);
        $this->AddValidator($name, StringLength::MinLength(6));
    }
    
    private function AddTermsField()
    {
        $name = 'Terms';
        $field = new Checkbox($name);
        $this->AddField($field);
        $this->SetRequired($name);
    }
    
    
    protected function OnSuccess()
    {
        $this->member = new Member();
        $this->member->SetEMail($this->Value('EMail'));
        $this->member->SetName($this->Value('Name'));
        $password = $this->Value('Password');
        $salt = String::Start(md5(uniqid(microtime())), 8);
        $pwHash = hash('sha256', $password . $salt);
        $this->member->SetPassword($pwHash);
        $this->member->SetPasswordSalt($salt);
        $this->member->SetCreated(Date::Now());
        $this->member->Save();
        $this->SendConfirmMail();
        if ($this->register->GetNextUrl()) {
            Response::Redirect(FrontendRouter::Url($this->register->GetNextUrl()));
        }
    }
    
    private function SendConfirmMail()
    {
        $mailer = new \PHPMailer(true);
        $mailer->From = $this->register->GetMailFrom();
        $mailer->Subject = $this->register->GetMailSubject();
        $mailer->addAddress($this->Value('EMail'));
        $mailer->msgHTML($this->GetConfirmMessage());
        $mailer->send();
    }
    
    private function GetConfirmMessage()
    {
        $replacements = array();
        $replacements['Text1'] = $this->register->GetMailText1();
        $replacements['Text2'] = $this->register->GetMailText2();
        $replacements['Title'] = Html($this->register->GetMailSubject());
        $replacements['Styles'] = Html($this->register->GetMailStyles());
        $confirmUrl = $this->register->GetConfirmUrl();
        if ($confirmUrl)
        {
            $replacements['ConfirmUrl']  = Html(Confirmer::CalcUrl($this->member, $confirmUrl));
        }
        $template = Path::Combine(PathUtil::BundleFolder($this->MyBundle()),
                'MailTemplates/Confirm.phtml');
        $parser = new TemplateParser($replacements);
        return $parser->Parse($template);
    }
    public function AllowChildren()
    {
        return false;
    }
    
    public function ContentForm()
    {
        return new RegisterSimpleForm();
    }
    
    /**
     * Custom templates allowed
     * @return boolean Returns true
     */
    public function AllowCustomTemplates()
    {
        return true;
    }
}

