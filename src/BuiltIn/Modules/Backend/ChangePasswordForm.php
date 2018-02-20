<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Bundles\BuiltIn\Modules\Frontend\ChangePassword;
use App\Phine\Database\BuiltIn\ContentChangePassword;
use App\Phine\Database\BuiltIn\ContentChangePasswordSchema;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\FormElements\Fields\Textarea;
use Phine\Framework\Validation\PhpFilter;

class ChangePasswordForm extends ContentForm 
{
    
    /**
     * The confirm url selector form part
     * @var PageUrlSelector
     */
    protected $selectorConfirm;
    
    /**
     * The next url selector form part
     * @var PageUrlSelector
     */
    protected $selectorNext;
    
    /**
     *
     * @var ContentChangePassword
     */
    protected $changePassword;
    /**
     * The element schema
     * @return ContentChangePasswordSchema
     */
    protected function ElementSchema()
    {
        return ContentChangePassword::Schema();
    }

    protected function FrontendModule()
    {
        return new ChangePassword();
    }

    protected function InitForm()
    {
        $this->changePassword = $this->LoadElement();
        $this->AddConfirmUrlField();
        $this->AddNextUrlField();
        $this->AddMailFromField();
        $this->AddMailSubjectField();
        $this->AddMailText1Field();
        $this->AddMailText2Field();
        $this->AddMailStylesField();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddTemplateField();
        $this->AddSubmit();
    }
    
     /**
     * Adds the field for name field label
     */
    private function AddConfirmUrlField()
    {
        $name = 'ConfirmUrl';
        $this->selectorConfirm = new PageUrlSelector($name, Trans($this->Label($name)), $this->changePassword->GetConfirmUrl());
        $this->selectorConfirm->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorConfirm);
    }
    
     /**
     * Adds the field for name field label
     */
    private function AddNextUrlField()
    {
        $name = 'NextUrl';
        $this->selectorNext = new PageUrlSelector($name, Trans($this->Label($name)), $this->changePassword->GetNextUrl());
        $this->selectorNext->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorNext);
    }

    /**
     * Adds the field for e-mail field label
     */
    private function AddMailSubjectField()
    {
        $name = 'MailSubject';
        $field = Input::Text($name, $this->changePassword->GetMailSubject());
        $this->AddField($field);
        $this->SetRequired($name);
    }

    /**
     * Adds the field for mail text 1
     */
    private function AddMailText1Field()
    {
        $name = 'MailText1';
        $this->AddRichTextField($name, $this->changePassword->GetMailText1());
        $this->SetRequired($name);
    }

    /**
     * Adds the field for mail text 1
     */
    private function AddMailText2Field()
    {
        $name = 'MailText2';
        $this->AddRichTextField($name, $this->changePassword->GetMailText2());
    }

    private function AddMailStylesField()
    {
        $name = 'MailStyles';
        $field = new Textarea($name, $this->changePassword->GetMailStyles());
        $this->AddField($field);
    }

    private function AddMailFromField()
    {
        $name = 'MailFrom';
        $field = Input::Text($name, $this->changePassword->GetMailFrom());
        $this->AddField($field);
        $this->SetRequired($name);
        $this->AddValidator($name, PhpFilter::EMail());
    }

    protected function SaveElement()
    {
        $this->changePassword->SetNextUrl($this->selectorNext->Save($this->changePassword->GetNextUrl()));
        $this->changePassword->SetConfirmUrl($this->selectorConfirm->Save($this->changePassword->GetConfirmUrl()));
        $this->changePassword->SetMailFrom($this->Value('MailFrom'));
        $this->changePassword->SetMailStyles($this->Value('MailStyles'));
        $this->changePassword->SetMailText1($this->Value('MailText1'));
        $this->changePassword->SetMailText2($this->Value('MailText2'));
        $this->changePassword->SetMailSubject($this->Value('MailSubject'));
        
        return $this->changePassword;
    }
    
    /**
     * 
     * @return string[] Returns the wording labels
     */
    protected function Wordings()
    {
        $result = array();
        $result[] = 'Name';
        $result[] = 'Name.Validation.Required.Missing';
        $result[] = 'Name.Validation.DatabaseCount.TooFew';
        $result[] = 'ChangePasswordSubmit';
        return $result;
    }
}

