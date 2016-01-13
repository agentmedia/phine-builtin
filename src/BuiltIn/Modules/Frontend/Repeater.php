<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Bundles\BuiltIn\Modules\Backend\RepeaterForm;
use Phine\Database\BuiltIn\ContentRepeater;
use Phine\Bundles\Core\Logic\Rendering\ContentRenderer;

/**
 * Renders the repeater
 */
class Repeater extends FrontendModule
{
    
    /**
     * The repeater
     * @var ContentRepeater
     */
    protected $repeater;
    
    /**
     * The current tree item
     * @var mixed
     */
    protected $current;
    
    /**
     *
     * @var boolean
     */
    protected $isEmpty;
    public function AllowChildren()
    {
        return true;
    }
    
    /**
     * The associated backend form
     * @return RepeaterForm Returns the repeater form
     */
    public function ContentForm()
    {
        return new RepeaterForm();
    }
    
    /**
     * Initializes the repeater frontend module
     * @return boolean Returns tru
     */
    protected function Init()
    {
        $this->repeater = ContentRepeater::Schema()->ByContent($this->content);
        $this->current = $this->tree->FirstChildOf($this->item);
        $this->isEmpty = !$this->current;
        return parent::Init();
    }
    
    /**
     * Gets the next child
     * @return mixed Returns the next tree item
     */
    protected function NextChild()
    {
        $item = $this->current;
        $this->current = $this->tree->NextOf($item);
        return $item;
    }
    
    /**
     * Renders the child 
     * @param mixed $child The current content tree item
     */
    protected function RenderChild($child)
    {
        $renderer = new ContentRenderer($child, $this->tree);
        return $renderer->Render();
    }
    
    /**
     * Gets the backend name
     * @return string Returns the backend name
     */
    public function BackendName()
    {
        $result = 'repeater';
        if (!$this->content)
        {
            return $result;
        }
        $template = $this->content->GetTemplate();
        if ($template)
        {
            $result .= ' - ' . $template;
        }
        return $result;
    }
    
    /**
     * Custom templates are allowed
     * @return boolean Returns true
     */
    public function AllowCustomTemplates()
    {
        return true;
    }
}

