<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Bundles\BuiltIn\Modules\Backend\ContainerForm;
use Phine\Database\BuiltIn\ContentContainer;
use Phine\Bundles\Core\Logic\Rendering\ContentsRenderer;
use Phine\Bundles\Core\Logic\Tree\ContainerContentTreeProvider;

/**
 * Renders the div
 */
class Container extends FrontendModule
{
    /**
     * The contents string of the container
     * @var string
     */
    protected $contents;
    public function AllowChildren()
    {
        return false;
    }
    
    public function ContentForm()
    {
        return new ContainerForm();
    }
    
     /**
     * Initializes the html frontend module
     * @return boolean
     */
    protected function Init()
    {
        $contentContainer = ContentContainer::Schema()->ByContent($this->content);
        $tree = new ContainerContentTreeProvider($contentContainer->GetContainer());
        
        $renderer = new ContentsRenderer($tree->TopMost(), $tree);
        $this->contents = $renderer->Render();
        return parent::Init();
    }
    
    public function BackendName()
    {
        $result = 'container';
        if (!$this->content)
        {
            return $result;
        }
        $contContainer = ContentContainer::Schema()->ByContent($this->content);
        $result = '« ' . $contContainer->GetContainer()->GetName() . ' »';
        return $result;
    }
}

