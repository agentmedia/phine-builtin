<?php
namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Bundles\BuiltIn\Modules\Frontend\HtmlWrap;
use App\Phine\Database\BuiltIn\ContentHtmlWrap;
use Phine\Framework\FormElements\RichTextEditor\CKEditorRenderer;
use Phine\Framework\FormElements\Fields\Custom;
use Phine\Bundles\Core\Logic\Util\PathUtil;

/**
 * The content form for an html element
 */
class HtmlWrapForm extends ContentForm
{
    /**
     * The html wrap content
     * @var ContentHtmlWrap
     */
    private $htmlWrap;
    /**
     * Returns the related html frontend module
     * @return HtmlWrap
     */
    protected function FrontendModule()
    {
        return new HtmlWrap();
    }
    /**
     * Gets the content html schema
     * @return \Phine\Database\BuiltIn\ContentHtmlWrapSchema
     */
    protected function ElementSchema()
    {
        return ContentHtmlWrap::Schema();
    }

    /**
     * Initializes the html content form
     */
    protected function InitForm()
    {
        $this->htmlWrap = $this->LoadElement();
        $name = 'Html';
        $this->AddRichTextField($name, $this->htmlWrap->GetHtml());
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddSubmit();
    }
    
    /**
     * Attaches properties to the html wrap element
     * @return ContentHtmlWrap Returns the saved html wrap
     */
    protected function SaveElement()
    {
        $this->htmlWrap->SetHtml($this->Value('Html'));
        return $this->htmlWrap;
    }


}

