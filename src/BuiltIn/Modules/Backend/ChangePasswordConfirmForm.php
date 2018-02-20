<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use App\Phine\Database\BuiltIn\ContentChangePasswordConfirm;
use App\Phine\Database\BuiltIn\ContentChangePasswordConfirmSchema;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;
use Phine\Bundles\BuiltIn\Modules\Frontend\ChangePasswordConfirm;

/**
 * The change Password confirmation element
 */
class ChangePasswordConfirmForm extends ContentForm
{
    /**
     * The register confirm element
     * @var ContentChangePasswordConfirm
     */
    protected $confirm;
    
    /**
     * The success url selector
     * @var PageUrlSelector 
     */
    protected $selectorSuccess;
    
    
    /**
     * The error url selector
     * @var PageUrlSelector 
     */
    protected $selectorError;
    
    /**
     * Gets the confirm database schema
     * @return ContentChangePasswordConfirmSchema
     */
    protected function ElementSchema()
    {
        return ContentChangePasswordConfirm::Schema();
    }

    protected function FrontendModule()
    {
        return new ChangePasswordConfirm();
    }

    protected function InitForm()
    {
        $this->confirm = $this->LoadElement();
       
        $this->AddSuccessUrlElement();
        $this->AddErrorUrlElement();
        $this->AddTemplateField();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddSubmit();
    }
    
    private function AddSuccessUrlElement()
    {
        $name = 'SuccessUrl';
        $this->selectorSuccess = new PageUrlSelector($name, Trans($this->Label($name)), $this->confirm->GetSuccessUrl());
        //$this->selectorSuccess->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorSuccess);
    }
    
    
    private function AddErrorUrlElement()
    {
        $name = 'ErrorUrl';
        $this->selectorError = new PageUrlSelector($name, Trans($this->Label($name)), $this->confirm->GetErrorUrl());
        //$this->selectorError ->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorError);
    }

    /**
     * Sets the confirm properties as given in the form
     * @return ContentRegisterConfirm
     */
    protected function SaveElement()
    {
        $this->confirm->SetErrorUrl($this->selectorError->Save($this->confirm->GetErrorUrl()));
        $this->confirm->SetSuccessUrl($this->selectorSuccess->Save($this->confirm->GetSuccessUrl()));
        return $this->confirm;
    }
    
    /**
     * Returns the wording labels for success and error
     * @return string[] Returns the wording labels
     */
    protected function Wordings()
    {
        $result = array();
        $result[] = 'Success';
        $result[] = 'Error';
        $result[] = 'Password';
        $result[] = 'Password.Validation.Required.Missing';
        $result[] = 'PasswordRepeat';
        $result[] = 'PasswordRepeat.Validation.Required.Missing';
        $result[] = 'PasswordRepeat.Validation.CompareCheck.EqualsNot_{0}';
        $result[] = 'PasswordChangeSubmit';
        return $result;
    }

}

