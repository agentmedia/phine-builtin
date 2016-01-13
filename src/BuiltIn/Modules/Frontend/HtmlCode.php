<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Database\BuiltIn\ContentHtmlCode;
use Phine\Bundles\BuiltIn\Modules\Backend\HtmlCodeForm;
use Phine\Framework\System\Text;
/**
 * Renders the html code
 */
class HtmlCode extends FrontendModule
{
    /**
     * The html code
     * @var string
     */
    protected $code;
    
    /**
     * Initializes the html code frontend module
     * @return boolean
     */
    protected function Init()
    {
        $htmlCode = ContentHtmlCode::Schema()->ByContent($this->content);
        $this->code= $htmlCode->GetCode();
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
     * The form for crearting this element
     * @return HtmlCodeForm
     */
    public function ContentForm()
    {
        return new HtmlCodeForm();
    }
    
    /**
     * The backend name for the code
     * @return string
     */
    public function BackendName()
    {
        $result = 'code';
        if (!$this->content)
        {
            return $result;
        }
        $htmlCode = ContentHtmlCode::Schema()->ByContent($this->content);
        $code = Text::Shorten($htmlCode->GetCode());
        if ($code)
        {
            $result .= ' - ' . $code;
        }
        return $result;
    }
    
}

