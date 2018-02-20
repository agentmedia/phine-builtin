<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Bundles\BuiltIn\Modules\Backend\BlockForm;
use App\Phine\Database\BuiltIn\ContentBlock;

/**
 * Renders the block
 */
class Block extends FrontendModule
{
    
    /**
     * The tag name
     * @var string
     */
    protected $tag;
    public function AllowChildren()
    {
        return true;
    }
    
    public function ContentForm()
    {
        return new BlockForm();
    }
    
    /**
     * Initializes the html frontend module
     * @return boolean
     */
    protected function Init()
    {
        $block = ContentBlock::Schema()->ByContent($this->content);
        $this->tag = $block->GetTagName();
        return parent::Init();
    }
    
    public function BackendName()
    {
        if (!$this->content)
        {
            return 'block';
        }
        $block = ContentBlock::Schema()->ByContent($this->content);
        $result = $block->GetTagName();
        if ($this->content->GetCssID())
        {
            $result .= ' #' . $this->content->GetCssID();
        }
        else if ($this->content->GetCssClass())
        {
            $result .= ' .' . $this->content->GetCssClass();
        }
        return $result;
    }
}

