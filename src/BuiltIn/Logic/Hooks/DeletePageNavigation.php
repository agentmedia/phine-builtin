<?php

namespace Phine\Bundles\BuiltIn\Logic\Hooks;
use Phine\Bundles\Core\Logic\Hooks\IDeleteHook;
use App\Phine\Database\Core\Page;
use App\Phine\Database\BuiltIn\NavigationPage;
use Phine\Bundles\BuiltIn\Logic\Tree\NavigationTreeProvider;
use Phine\Bundles\Core\Logic\Tree\TreeBuilder;

/**
 * Implements clean navigation item removal on page deletion
 */
class DeletePageNavigation implements IDeleteHook 
{
    /**
     * Deletes the navi items related to the page
     * @param Page $item The page to be deleted
     */
    public function BeforeDelete($item)
    {
        $navPages = NavigationPage::Schema()->FetchByPage(false, $item);
        foreach ($navPages as $navPage)
        {
            $item = $navPage->GetItem();
            $tree = new TreeBuilder(new NavigationTreeProvider($item->GetNavigation()));
            $tree->Remove($item);
        }
    }
}