<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Database\BuiltIn\ContentHtml;
use Phine\Bundles\BuiltIn\Modules\Backend\HtmlForm;
use Phine\Framework\System\Text;
/**
 * Renders the html
 */
class Html extends FrontendModule
{
    /**
     *
     * @var string
     */
    protected $html;
    
    /**
     * Initializes the html frontend module
     * @return boolean
     */
    protected function Init()
    {
        $html = ContentHtml::Schema()->ByContent($this->content);
        $this->html = $html->GetHtml();
        return parent::Init();
    }
    
    /**
     * No child contents allowed
     * @return boolean
     */
    public function AllowChildren()
    {
        return false;
    }
    
    /**
     * 
     * @return HtmlForm
     */
    public function ContentForm()
    {
        return new HtmlForm();
    }
    
    public function BackendName()
    {
        $result = 'html';
        if (!$this->content)
        {
            return $result;
        }
        $html = ContentHtml::Schema()->ByContent($this->content);
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
    
}

