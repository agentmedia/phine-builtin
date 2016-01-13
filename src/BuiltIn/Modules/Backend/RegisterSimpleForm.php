<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;

use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Database\BuiltIn\ContentRegisterSimple;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Bundles\BuiltIn\Modules\Frontend\RegisterSimple;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;
use Phine\Framework\FormElements\RichTextEditor\CKEditorRenderer;
use Phine\Bundles\Core\Logic\Util\PathUtil;
use Phine\Framework\FormElements\Fields\Custom;
use Phine\Framework\FormElements\Fields\Textarea;
use Phine\Framework\Validation\PhpFilter;

/**
 * The register simple form
 */
class RegisterSimpleForm extends ContentForm
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
     * The simple register form
     * @var ContentRegisterSimple
     */
    private $register;

    /**
     * Gets The schema associated with this form
     * @return \Phine\Database\BuiltIn\ContentRegisterSimpleSchema Gets the register simple table schema
     */
    protected function ElementSchema()
    {
        return ContentRegisterSimple::Schema();
    }

    /**
     * The frontend element
     * @return RegisterSimple
     */
    protected function FrontendModule()
    {
        return new RegisterSimple();
    }

    /**
     * Initializes the simple registration form
     */
    protected function InitForm()
    {
        $this->register = $this->LoadElement();
        $this->AddConfirmUrlField();
        $this->AddNextUrlField();
        
        $this->AddMailFromField();
        $this->AddMailStylesField();
        $this->AddMailSubjectField();
        $this->AddMailText1Field();
        $this->AddMailText2Field();
        $this->AddCssIDField();
        $this->AddCssClassField();
        $this->AddTemplateField();
        $this->AddSubmit();
    }

    /**
     * Adds the field for name field label
     */
    private function AddConfirmUrlField()
    {
        $name = 'ConfirmUrl';
        $this->selectorConfirm = new PageUrlSelector($name, Trans($this->Label($name)), $this->register->GetConfirmUrl());
        $this->selectorConfirm->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorConfirm);
    }
    
     /**
     * Adds the field for name field label
     */
    private function AddNextUrlField()
    {
        $name = 'NextUrl';
        $this->selectorNext = new PageUrlSelector($name, Trans($this->Label($name)), $this->register->GetNextUrl());
        $this->selectorNext->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorNext);
    }

    /**
     * Adds the field for e-mail field label
     */
    private function AddMailSubjectField()
    {
        $name = 'MailSubject';
        $field = Input::Text($name, $this->register->GetMailSubject());
        $this->AddField($field);
        $this->SetRequired($name);
    }

    /**
     * Adds the field for mail text 1
     */
    private function AddMailText1Field()
    {
        $name = 'MailText1';
        $renderer = new CKEditorRenderer(PathUtil::BackendRTEPath(), PathUtil::BackendRteUrl(), PathUtil::UploadPath(), PathUtil::UploadUrl(), self::Guard());

        $field = new Custom($renderer);
        $field->SetName($name);
        $field->SetValue($this->register->GetMailText1());
        $this->AddField($field);
        $this->SetRequired($name);
    }

    /**
     * Adds the field for mail text 1
     */
    private function AddMailText2Field()
    {
        $name = 'MailText2';
        $renderer = new CKEditorRenderer(PathUtil::BackendRTEPath(), PathUtil::BackendRteUrl(), PathUtil::UploadPath(), PathUtil::UploadUrl(), self::Guard());

        $field = new Custom($renderer);
        $field->SetName($name);
        $field->SetValue($this->register->GetMailText2());
        $this->AddField($field);
    }

    private function AddMailStylesField()
    {
        $name = 'MailStyles';
        $field = new Textarea($name, $this->register->GetMailStyles());
        $this->AddField($field);
    }

    private function AddMailFromField()
    {
        $name = 'MailFrom';
        $field = Input::Text($name, $this->register->GetMailFrom());
        $this->AddField($field);
        $this->SetRequired($name);
        $this->AddValidator($name, PhpFilter::EMail());
    }

    /**
     * Saves the simple register element
     * @return ContentRegisterSimple
     */
    protected function SaveElement()
    {
        $this->register->SetConfirmUrl($this->selectorConfirm->Save($this->register->GetConfirmUrl()));
        $this->register->SetNextUrl($this->selectorNext->Save($this->register->GetNextUrl()));
        $this->register->SetMailFrom($this->Value('MailFrom'));
        $this->register->SetMailText1($this->Value('MailText1'));
        $this->register->SetMailText2($this->Value('MailText2'));
        $this->register->SetMailSubject($this->Value('MailSubject'));
        $this->register->SetMailStyles($this->Value('MailStyles'));
        return $this->register;
    }

    protected function Wordings()
    {
        return array(
            'Name',
            'Name.Validation.Required.Missing',
            'Name.Validation.StringLength.TooShort_{0}',
            'Name.Validation.DatabaseCount.TooMuch',
            'EMail',
            'EMail.Validation.Required.Missing',
            'EMail.Validation.PhpFilter.InvalidEmail',
            'EMail.Validation.DatabaseCount.TooMuch',
            'Password',
            'Password.Validation.Required.Missing',
            'Password.Validation.StringLength.TooShort_{0}',
            'Terms',
            'Terms.Validation.Required.Missing',
            'RegisterSubmit');
    }

}
