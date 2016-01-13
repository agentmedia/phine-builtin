<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;

use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Bundles\BuiltIn\Modules\Backend\NavigationForm;
use Phine\Database\BuiltIn\ContentNavigation;
use Phine\Bundles\BuiltIn\Logic\Tree\NavigationTreeProvider;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
use Phine\Database\BuiltIn\NavigationItem;
use Phine\Bundles\Core\Logic\Rendering\PageRenderer;

/**
 * Renders a navigation defined by the 
 */
class Navigation extends FrontendModule
{

    /**
     * The rendered navi;
     * @var ContentNavigation
     */
    private $navi;

    /**
     *
     * @var boolean
     */
    protected $isEmpty = false;

    /**
     *
     * @var boolean
     */
    protected $isSubLevel = false;

    /**
     *
     * @var NavigationTreeProvider
     */
    protected $naviTree;

    /**
     * The currently rendered item
     * @var NavigationItem
     */
    protected $naviItem;

    /**
     * Parent item in sub levels (or null on top level)
     * @var NavigationItem
     */
    protected $naviParent = null;

    /**
     * The level
     * @var int
     */
    protected $level;

    public function AllowChildren()
    {
        return false;
    }

    protected function Init()
    {
        $this->navi = ContentNavigation::Schema()->ByContent($this->content);
        $this->naviTree = new NavigationTreeProvider($this->navi);
        $this->level = 0;
        $this->naviItem = $this->naviTree->FirstChildOf($this->naviParent);
        $this->isEmpty = $this->naviItem == null;
        $this->CalcLevel();
        return parent::Init();
    }

    private function CalcLevel()
    {
        $this->level = 0;
        if (!$this->isSubLevel || $this->isEmpty)
        {
            return;
        }
        $parent = $this->naviTree->ParentOf($this->naviItem);
        while ($parent)
        {
            ++$this->level;
            $parent = $this->naviTree->ParentOf($parent);
        }
    }

    /**
     * Creates a navigation renderer for a sub level
     * @param NavigationItem $parent
     * @return Navigation
     */
    protected function CreateSubLevel(NavigationItem $parent)
    {
        $navigation = new self();
        $navigation->isSubLevel = true;
        $navigation->naviParent = $parent;
        $navigation->SetTreeItem($this->tree, $this->item);
        return $navigation;
    }

    protected function Url()
    {
        $urlItem = $this->naviItem->GetUrlItem();
        if ($urlItem)
        {
            return $urlItem->GetUrl();
        }
        $pageItem = $this->naviItem->GetPageItem();
        if ($pageItem)
        {
            return FrontendRouter::Url($pageItem);
        }
        $itemID = $this->naviItem->GetID();
        throw new \LogicException("Navigation item (ID = $itemID) without related url or page: clean up database manually");
    }

    protected function ItemClasses()
    {
        $classes = array();
        $classes[] = 'level-' . $this->level;
        if ($this->naviItem->Equals($this->naviTree->FirstChildOf($this->naviParent)))
        {
            $classes[] = 'first-item';
        }
        if ($this->naviTree->NextOf($this->naviItem) == null)
        {
            $classes[] = 'last-item';
        }
        if ($this->IsActive())
        {
            $classes[] = 'active';
        }
        else if ($this->IsTrail())
        {
            $classes[] = 'trail';
        }
        return join(' ', $classes);
    }

    /**
     * Returns true if the current item points to the current page
     * @return boolean
     */
    private function IsActive()
    {
        $pageItem = $this->naviItem->GetPageItem();
        if (!$pageItem)
        {
            return false;
        }
        return $pageItem->GetPage()->Equals(PageRenderer::Page());
    }
    
    /**
     * Checks if the current navigation item points to a parent of the current page
     * @return boolean Returns true if the current page is a child of the current item
     */
    private function IsTrail()
    {
        $pageItem = $this->naviItem->GetPageItem();
        if (!$pageItem)
        {
            return false;
        }
        $parent = PageRenderer::Page()->GetParent();
        $itemPage = $pageItem->GetPage();
        while ($parent)
        {
            if ($itemPage->Equals($parent))
            {
                return true;
            }
            $parent = $parent->GetParent();
        }
        return false;
    }

    protected function RenderSubLevel()
    {
        $navigation = $this->CreateSubLevel($this->naviItem);
        return $navigation->Render();
    }

    protected function NextItem()
    {
        return $this->naviTree->NextOf($this->naviItem);
    }

    public function ContentForm()
    {
        return new NavigationForm();
    }

    public function BackendName()
    {
        $result = 'navigation';
        if (!$this->content)
        {
            return $result;
        }
        $navi = ContentNavigation::Schema()->ByContent($this->content);
        return $result . ' ' . $navi->GetName();
    }

    public function AllowCustomTemplates()
    {
        return true;
    }

}
