<?php
namespace Phine\Bundles\BuiltIn\Snippets\Backend;

use Phine\Bundles\Core\Logic\Snippet\TemplateSnippet;
use Phine\Database\BuiltIn\NavigationItem;
use Phine\Bundles\BuiltIn\Logic\Tree\NavigationTreeProvider;
use Phine\Bundles\Core\Logic\Routing\BackendRouter;
use Phine\Bundles\BuiltIn\Modules\Backend\NavigationItemForm;
use Phine\Database\BuiltIn\ContentNavigation;

class NavigationBranch extends TemplateSnippet
{
    /**
     * The current item
     * @var NavigationItem
     */
    protected $item; 
    
    /**
     * The current child
     * @var NavigationItem
     */
    protected $child;
    
    /**
     *
     * @var NavigationTreeProvider
     */
    private $tree;
    
    /**
     *
     * @var ContentNavigation
     */
    private $navigation;
    function __construct(NavigationItem $item)
    {
        $this->item = $item;
        $this->navigation = $this->item->GetNavigation();
        $this->tree = new NavigationTreeProvider($this->item->GetNavigation());
        $this->child = $this->tree->FirstChildOf($this->item);
    }
    
    protected function NextChild()
    {
        $child = $this->child;
        $this->child = $this->tree->NextOf($this->child);
        return $child;
    }
    
    protected function ParentID()
    {
        $parent = $this->tree->ParentOf($this->item);
        return $parent ? $parent->GetID() : '0';
    }
    
    protected function CreateInUrl()
    {
        $args = array('navigation'=>$this->navigation->GetID());
        $args['parent'] = $this->item->GetID();
        return BackendRouter::ModuleUrl(new NavigationItemForm(), $args);   
    }
    
    
    protected function EditUrl()
    {
        $args = array('navigation'=>$this->navigation->GetID());
        $args['item'] = $this->item->GetID();
        return BackendRouter::ModuleUrl(new NavigationItemForm(), $args);   
    }
    
    protected function CreateAfterUrl()
    {
        $args = array('navigation'=>$this->navigation->GetID());
        $args['previous'] = $this->item->GetID();
        $parent = $this->item->GetParent();
        if ($parent)
        {
            $args['parent'] = $parent->GetID(); 
        }
        return BackendRouter::ModuleUrl(new NavigationItemForm(), $args);        
    }
}