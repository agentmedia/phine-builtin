<?php
namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Framework\FormElements\Fields\Textarea;
use Phine\Bundles\BuiltIn\Modules\Frontend\HtmlCode;
use App\Phine\Database\BuiltIn\ContentHtmlCode;

/**
 * The content form for an html element
 */
class HtmlCodeForm extends ContentForm
{
    /**
     * The html code content
     * @var ContentHtmlCode
     */
    private $htmlCode;
    /**
     * Returns the related html frontend module
     * @return Html
     */
    protected function FrontendModule()
    {
        return new HtmlCode();
    }
    /**
     * Gets the content html schema
     * @return \Phine\Database\BuiltIn\ContentHtmlCodeSchema
     */
    protected function ElementSchema()
    {
        return ContentHtmlCode::Schema();
    }

    /**
     * Initializes the html code content form
     */
    protected function InitForm()
    {
        $this->htmlCode = $this->LoadElement();
        $name = 'Code';
        $this->AddField(new Textarea($name, $this->htmlCode->GetCode()));
        $this->SetRequired($name);
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddSubmit();
    }
    
    /**
     * Attaches properties to the html code element
     * @return ContentHtmlCode Returns the saved html codes
     */
    protected function SaveElement()
    {
        $this->htmlCode->SetCode($this->Value('Code'));
        return $this->htmlCode;
    }


}

