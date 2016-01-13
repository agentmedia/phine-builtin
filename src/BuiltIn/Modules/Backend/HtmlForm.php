<?php
namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Bundles\BuiltIn\Modules\Frontend\Html;
use Phine\Database\BuiltIn\ContentHtml;
use Phine\Framework\FormElements\RichTextEditor\CKEditorRenderer;
use Phine\Framework\FormElements\Fields\Custom;
use Phine\Bundles\Core\Logic\Util\PathUtil;

/**
 * The content form for an html element
 */
class HtmlForm extends ContentForm
{
    /**
     * The html content
     * @var ContentHtml
     */
    private $html;
    /**
     * Returns the related html frontend module
     * @return Html
     */
    protected function FrontendModule()
    {
        return new Html();
    }
    /**
     * Gets the content html schema
     * @return \Phine\Database\BuiltIn\ContentHtmlSchema
     */
    protected function ElementSchema()
    {
        return ContentHtml::Schema();
    }

    /**
     * Initializes the html content form
     */
    protected function InitForm()
    {
        $this->html = $this->LoadElement();
        $name = 'Html';
        $this->AddRichTextField($name, $this->html->GetHtml());
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddCacheLifetimeField();
        $this->AddSubmit();
    }
    
    /**
     * Attaches properties to the html element
     * @return ContentHtml Returns the saved html
     */
    protected function SaveElement()
    {
        $this->html->SetHtml($this->Value('Html'));
        return $this->html;
    }


}

