<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Database\BuiltIn\ContentLogout;
use Phine\Database\BuiltIn\ContentLogoutSchema;
use Phine\Bundles\BuiltIn\Modules\Frontend\Logout;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;

/**
 * The logout element form
 */
class LogoutForm extends ContentForm
{
    /**
     * The logout element
     * @var ContentLogout
     */
    private $logout;
    
    /**
     * The page url selector for the redirect url
     * @var PageUrlSelector
     */
    protected $selectorNext;
    
    /**
     * Gets the element database schea
     * @return ContentLogoutSchema Returns the logout element database schema
     */
    protected function ElementSchema()
    {
        return ContentLogout::Schema();
    }

    /**
     * 
     * @return Logout Returns the related frontend module
     */
    protected function FrontendModule()
    {
        return new Logout();
    }
    /**
     * Intializes the form
     */
    protected function InitForm()
    {
        $this->logout = $this->LoadElement();
        $this->AddNextUrlField();
        $this->AddCssIDField();
        $this->AddCssClassField();
        $this->AddTemplateField();
        $this->AddSubmit();
    }
    /**
     * Adds the next url field
     */
    private function AddNextUrlField()
    {
        $name = 'NextUrl';
        $this->selectorNext = new PageUrlSelector($name, $this->Label($name), $this->logout->GetNextUrl());
        $this->selectorNext->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorNext);
        
    }
    
    /**
     * Saves the element and returns it
     * @return ContentLogout
     */
    protected function SaveElement()
    {
        $this->logout->SetNextUrl($this->selectorNext->Save($this->logout->GetNextUrl()));
        return $this->logout;
    }
    /**
     * Gets the wording labels for the logout element
     * @return string Returns the supported frontend wordings
     */
    protected function Wordings()
    {
        return array('SubmitLogout');
    }

}

