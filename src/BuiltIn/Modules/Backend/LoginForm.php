<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use App\Phine\Database\BuiltIn\ContentLogin;
use App\Phine\Database\BuiltIn\ContentLoginSchema;
use Phine\Bundles\BuiltIn\Modules\Frontend\Login;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;

class LoginForm extends ContentForm
{
    
    /**
     * The selector for the next url
     * @var PageUrlSelector
     */
    protected $selectorNext;
    
    /**
     * The selector for the password url
     * @var PageUrlSelector
     */
    protected $selectorPassword;
    
    /**
     * The login element
     * @var ContentLogin
     */
    private $login;
    
    /**
     * The element schema
     * @return ContentLoginSchema
     */
    protected function ElementSchema()
    {
        return ContentLogin::Schema();
    }

    /**
     * The module for frontend rendering
     * @return Login Returns the login element
     */
    protected function FrontendModule()
    {
        return new Login();
    }

    protected function InitForm()
    {
        $this->login = $this->LoadElement();
        $this->AddNextUrlField();
        $this->AddPasswordUrlField();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddTemplateField();
        $this->AddSubmit();
    }
    
    private function AddPasswordUrlField()
    {
        $name = 'PasswordUrl';
        $this->selectorPassword = new PageUrlSelector($name, Trans($this->Label($name)), 
                $this->login->GetPasswordUrl());
        
        $this->Elements()->AddElement($name, $this->selectorPassword);
    }
    private function AddNextUrlField()
    {
        $name = 'NextUrl';
        $this->selectorNext = new PageUrlSelector($name, Trans($this->Label($name)), 
                $this->login->GetNextUrl());
        $this->Elements()->AddElement($name, $this->selectorNext);
    }
    
    /**
     * Saves the login element and returns it
     * @return ContentLogin Returns the login element with form values applied
     */
    protected function SaveElement()
    {
        $this->login->SetNextUrl($this->selectorNext->Save($this->login->GetNextUrl()));
        $this->login->SetPasswordUrl($this->selectorPassword->Save($this->login->GetPasswordUrl()));
        return $this->login;
    }
    
    /**
     * Gets the wording labels for the login form
     */
    protected function Wordings()
    {
        $result = array();
        $result[] = 'Name';
        $result[] = 'Name.Validation.Required.Missing';
        $result[] = 'Password';
        $result[] = 'Password.Validation.Required.Missing';
        $result[] = 'Password.Link_{0}';
        $result[] = 'Access.Validation.Access.NotGranted';
        $result[] = 'LoginSubmit';
        
        return $result;
        
    }

}

