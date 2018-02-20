<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;

use Phine\Bundles\Core\Modules\Backend\Base\JsonTree;
use App\Phine\Database\BuiltIn\NavigationItem;
use Phine\Bundles\BuiltIn\Logic\Tree\NavigationTreeProvider;
    

/**
 * Json handler for the navigation tree
 */
class JsonNavigationTree extends JsonTree
{
    protected function TableSchema()
    {
        return NavigationItem::Schema();
    }

    protected function TreeProvider()
    {
        return new NavigationTreeProvider($this->item->GetNavigation());
    }
}


