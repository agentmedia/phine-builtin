<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use App\Phine\Database\BuiltIn\ContentChangeEmailConfirm;
use App\Phine\Database\BuiltIn\ContentChangeEmailConfirmSchema;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;
use Phine\Bundles\BuiltIn\Modules\Frontend\ChangeEMailConfirm;

/**
 * The change email confirmation element
 */
class ChangeEMailConfirmForm extends ContentForm
{
    /**
     * The register confirm element
     * @var ContentChangeEmailConfirm
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
     * @return ContentChangeEmailConfirmSchema
     */
    protected function ElementSchema()
    {
        return ContentChangeEmailConfirm::Schema();
    }

    protected function FrontendModule()
    {
        return new ChangeEMailConfirm();
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
        return array('Success', 'Error');
    }

}

