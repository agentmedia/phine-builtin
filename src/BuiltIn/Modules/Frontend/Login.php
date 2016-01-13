<?php
namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendForm;
use Phine\Bundles\BuiltIn\Modules\Backend\LoginForm;
use Phine\Database\BuiltIn\ContentLogin;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\Validation\Access;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use Phine\Framework\System\Http\Response;
use Phine\Framework\System\Http\Request;
use Phine\Bundles\Core\Logic\Tree\PageTreeProvider;
use Phine\Bundles\Core\Logic\Rendering\PageRenderer;
use Phine\Framework\System\String;

/**
 * The member login element
 */
class Login extends FrontendForm
{
    /**
     * The login element
     * @var ContentLogin
     */
    private $login;
    
    /**
     * The password reset link
     * @var string
     */
    protected $passwordLink;
  /*  
    protected function BeforeInit()
    {
        if (!self::Guard()->Accessor()->IsUndefined() && $this->NextUrl())
        {
            Response::Redirect($this->NextUrl());
        }
        return parent::BeforeInit();
    }
    */
    /**
     * Initializes the login element
     * @return boolean Returns always true
     */
    protected function Init()
    {
        $this->login = ContentLogin::Schema()->ByContent($this->Content());
        $this->HandleLoggedIn();
        $passwordUrl = $this->login->GetPasswordUrl();
        $this->passwordUrl = $passwordUrl ? FrontendRouter::Url($passwordUrl) : '';
        $this->AddNameField();
        $this->AddPasswordField();
        $this->AddUniqueSubmit('LoginSubmit');
        $validator = new Access(self::Guard(), false, $this->ErrorPrefix('Access'));
        $this->Elements()->AddValidator($validator);
        return parent::Init();
    }
    
    private function HandleLoggedIn()
    {
        $nextUrl = $this->login->GetNextUrl();
        if (!self::Guard()->Accessor()->IsUndefined())
        {
            if ($nextUrl)
            {
                Response::Redirect($nextUrl);
            }
            else
            {
                throw new \Exception(Trans('BuiltIn.Login.Exception.AlreadyLoggedIn'));
            }
        }
    }
    
    private function AddNameField()
    {
        $name = 'Name';
        $field = Input::Text($name);
        $this->AddField($field);
        $this->SetRequired($name);
    }

    private function AddPasswordField()
    {
        $name = 'Password';
        $field = Input::Password($name);
        $this->AddField($field);
        $this->SetRequired($name);
    }

    protected function OnSuccess()
    {
        if (self::Guard()->Accessor()->IsUndefined())
        {
            self::Guard()->Login(array('Name'=>$this->Value('Name'), 
                'Password'=>$this->Value('Password')));
        }
        $nextUrl = $this->NextUrl();
        if ($nextUrl) 
        {
            Response::Redirect($nextUrl);
        }
    }
    
    /**
     * 
     * @return string
     * @throws \LogicException Raises an error if no different redirect page is found
     */
    private function NextUrl()
    {
        $nextUrl = String::Trim(Request::GetData('nextUrl'));
        if ($nextUrl) 
        {
            return $nextUrl;
        }
        $nextPageUrl = $this->login->GetNextUrl();
        if ($nextPageUrl)
        {
            return FrontendRouter::Url($nextPageUrl);
        }
        return '';
    }

    
    /**
     * False because no customizable sub elements are allowed
     * @return boolean Returns false, no child elements allowed
     */
    public function AllowChildren()
    {
        return false;
    }

    /**
     * The backend content form for the login element
     * @return LoginForm Returns the related content form
     */
    public function ContentForm()
    {
        return new LoginForm();
    }
    
    /**
     * True because custom templates are allowed
     * @return boolean Returns true
     */
    public function AllowCustomTemplates()
    {
        return true;
    }
}

