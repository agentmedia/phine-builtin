<?php

namespace Phine\Bundles\BuiltIn\Logic\Tree;
use Phine\Bundles\Core\Logic\Tree\ITreeProvider;
use Phine\Database\BuiltIn\NavigationItem;
use Phine\Database\BuiltIn\ContentNavigation;
use Phine\Database\Access;

class NavigationTreeProvider implements ITreeProvider
{
    /**
     * The content navigation
     * @var ContentNavigation
     */
    private $navi;
    
    /**
     * Creates the tree provider
     * @param ContentNavigation $navi The navigation
     */
    function __construct(ContentNavigation $navi)
    {
        $this->navi = $navi;
    }
    
    /**
     * Deletes the navigation item
     * @param NavigationItem $item
     */
    public function Delete($item)
    {
        $item->Delete();
    }

    /**
     * Compares the items
     * @param NavigationItem $item1
     * @param NavigationItem $item2
     */
    public function Equals($item1, $item2)
    {
        if ($item1 === null && $item2 !== null)
        {
            return false;
        }
        else if ($item1 !== null && $item2 === null)
        {
            return false;
        }
        else if ($item1 === null && $item2 === null)
        {
            return true;
        }
        return $item1->Equals($item2);
    }

    /**
     * Returns the first child of the item
     * @param NavigationItem $item
     */
    public function FirstChildOf($item)
    {
        $sql = Access::SqlBuilder();
        if ($item)
        {
            $tblNavItem = NavigationItem::Schema()->Table();
            $where = $sql->IsNull($tblNavItem->Field('Previous'))
                ->And_($sql->Equals($tblNavItem->Field('Parent'), $sql->Value($item->GetID())));
        
            return NavigationItem::Schema()->First($where);
        }
        else
        {
            return $this->TopMost();
        }
    }

    /**
     * Gets the next sibling of the item
     * @param NavigationItem $item
     * @return NavigationItem
     */
    public function NextOf($item)
    {
        return NavigationItem::Schema()->ByPrevious($item);
    }

    /**
     * Gets the parent of the navigation item
     * @param NavigationItem $item
     * @return NavigationItem
     */
    public function ParentOf($item)
    {
        return $item->GetParent();
    }

    /**
     * Gets the previous sibling of the navigation item
     * @param NavigationItem $item
     * @return NavigationItem
     */
    public function PreviousOf($item)
    {
        return $item->GetPrevious();
    }

    /**
     * Saves the navigation item
     * @param NavigationItem $item
     */
    public function Save($item)
    {
        $item->Save();
    }

    /**
     * Sets the parent (but doesn't save it)
     * @param NavigationItem $item
     * @param NavigationItem $parent
     */
    public function SetParent($item, $parent)
    {
        $item->SetParent($parent);
    }

    /**
     * Sets previous (but doesn't save it)
     * @param NavigationItem $item
     * @param NavigationItem $previous
     */
    public function SetPrevious($item, $previous = null)
    {
        $item->SetPrevious($previous);
    }

    /**
     * 
     * Gets the top most navigation item
     * @return NavigationItem
     */
    public function TopMost()
    {
        $tblNavItem = NavigationItem::Schema()->Table();
        $sql = Access::SqlBuilder();
        $where = $sql->Equals($tblNavItem->Field('Navigation'), $sql->Value($this->navi->GetID()))
            ->And_($sql->IsNull($tblNavItem->Field('Parent')))
            ->And_($sql->IsNull($tblNavItem->Field('Previous')));
        
        return NavigationItem::Schema()->First($where);
    }
}
