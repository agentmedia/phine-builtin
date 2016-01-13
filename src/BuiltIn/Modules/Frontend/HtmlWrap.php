<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Database\BuiltIn\ContentHtmlWrap;
use Phine\Bundles\BuiltIn\Modules\Backend\HtmlWrapForm;
use Phine\Framework\System\Text;
use Phine\Bundles\Core\Logic\Rendering\ContentRenderer;

/**
 * Html Wrapper
 */
class HtmlWrap extends FrontendModule
{
    /**
     * The html string
     * @var string
     */
    protected $html;
    
    /**
     * The child item which is currently iterated
     * @var mixed
     */
    private $currentChild;
    
    /**
     *
     * @var type 
     */
    private static $placeholder = '{{content::placeholder}}';
    /**
     * Initializes the html frontend module
     * @return boolean
     */
    protected function Init()
    {
        $htmlWrap = ContentHtmlWrap::Schema()->ByContent($this->content);
        $this->html = $htmlWrap->GetHtml();
        $this->currentChild = $this->tree->FirstChildOf($this->item);
        return parent::Init();
    }
    
    /**
     * Child contents are allowed
     * @return boolean Returns true to inform the backend that child items are allowed
     */
    public function AllowChildren()
    {
        return true;
    }
    
    /**
     * 
     * @return HtmlWrapForm
     */
    public function ContentForm()
    {
        return new HtmlWrapForm();
    }
    
    /**
     * The backend name
     * @return string The name as displayed in backend trees
     */
    public function BackendName()
    {
        $result = 'html wrap';
        if (!$this->content)
        {
            return $result;
        }
        $html = ContentHtmlWrap::Schema()->ByContent($this->content);
        $text = Text::Shorten($html->GetHtml());
        if ($text)
        {
            return $result . ' - ' . $text;
        }
        else if ($this->content->GetCssID())
        {
            return $result . ' #' . $this->content->GetCssID() ;
        }
        
        else if ($this->content->GetCssClass())
        {
            return $result . ' .' . $this->content->GetCssClass();
        }
        return $result;
    }
    /**
     * Gathers the html
     */
    function Html()
    {
        $text = $this->html;
        
        $pos = strpos($text, self::$placeholder);
        $phLength = strlen(self::$placeholder);
        while ($pos !== false && $this->currentChild)
        {
            $replacement = $this->RenderCurrentChild();
            $text = substr($text, 0, $pos) . $replacement . substr($text, $pos + $phLength);
            
            $this->currentChild = $this->tree->NextOf($this->currentChild);
            $pos = strpos($text, self::$placeholder, $pos  + strlen($replacement));
        }
        return $text;
    }
    
    /**
     * Renders the current child item
     * @return string
     */
    private function RenderCurrentChild()
    {
        $renderer = new ContentRenderer($this->currentChild, $this->tree);
        return $renderer->Render();
    }
}

