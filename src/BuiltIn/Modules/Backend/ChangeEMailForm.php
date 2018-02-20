<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Bundles\BuiltIn\Modules\Frontend\ChangeEMail;
use App\Phine\Database\BuiltIn\ContentChangeEmail;
use App\Phine\Database\BuiltIn\ContentChangeEmailSchema;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\FormElements\Fields\Textarea;
use Phine\Framework\Validation\PhpFilter;

class ChangeEMailForm extends ContentForm 
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
     * @var ContentChangeEmail
     */
    protected $changeMail;
    /**
     * The element schema
     * @return ContentChangeEmailSchema
     */
    protected function ElementSchema()
    {
        return ContentChangeEmail::Schema();
    }

    protected function FrontendModule()
    {
        return new ChangeEMail();
    }

    protected function InitForm()
    {
        $this->changeMail = $this->LoadElement();
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
        $this->selectorConfirm = new PageUrlSelector($name, Trans($this->Label($name)), $this->changeMail->GetConfirmUrl());
        $this->selectorConfirm->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorConfirm);
    }
    
     /**
     * Adds the field for name field label
     */
    private function AddNextUrlField()
    {
        $name = 'NextUrl';
        $this->selectorNext = new PageUrlSelector($name, Trans($this->Label($name)), $this->changeMail->GetNextUrl());
        $this->selectorNext->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorNext);
    }

    /**
     * Adds the field for e-mail field label
     */
    private function AddMailSubjectField()
    {
        $name = 'MailSubject';
        $field = Input::Text($name, $this->changeMail->GetMailSubject());
        $this->AddField($field);
        $this->SetRequired($name);
    }

    /**
     * Adds the field for mail text 1
     */
    private function AddMailText1Field()
    {
        $name = 'MailText1';
        $this->AddRichTextField($name, $this->changeMail->GetMailText1());
        $this->SetRequired($name);
    }

    /**
     * Adds the field for mail text 1
     */
    private function AddMailText2Field()
    {
        $name = 'MailText2';
        $this->AddRichTextField($name, $this->changeMail->GetMailText2());
    }

    private function AddMailStylesField()
    {
        $name = 'MailStyles';
        $field = new Textarea($name, $this->changeMail->GetMailStyles());
        $this->AddField($field);
    }

    private function AddMailFromField()
    {
        $name = 'MailFrom';
        $field = Input::Text($name, $this->changeMail->GetMailFrom());
        $this->AddField($field);
        $this->SetRequired($name);
        $this->AddValidator($name, PhpFilter::EMail());
    }

    protected function SaveElement()
    {
        $this->changeMail->SetNextUrl($this->selectorNext->Save($this->changeMail->GetNextUrl()));
        $this->changeMail->SetConfirmUrl($this->selectorConfirm->Save($this->changeMail->GetConfirmUrl()));
        $this->changeMail->SetMailFrom($this->Value('MailFrom'));
        $this->changeMail->SetMailStyles($this->Value('MailStyles'));
        $this->changeMail->SetMailText1($this->Value('MailText1'));
        $this->changeMail->SetMailText2($this->Value('MailText2'));
        $this->changeMail->SetMailSubject($this->Value('MailSubject'));
        
        return $this->changeMail;
    }
    
    /**
     * 
     * @return string[] Returns the wording labels
     */
    protected function Wordings()
    {
        $result = array();
        $result[] = 'FormLegend';
        $result[] = 'NewEMail';
        $result[] = 'NewEMail.Validation.Required.Missing';
        $result[] = 'NewEMail.Validation.PhpFilter.InvalidEmail';
        $result[] = 'NewEMail.Validation.DatabaseCount.TooMuch';
        $result[] = 'ChangeEMailSubmit';
        return $result;
    }
}

