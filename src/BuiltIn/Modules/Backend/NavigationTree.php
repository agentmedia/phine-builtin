<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;

use Phine\Bundles\Core\Logic\Module\BackendModule;
use Phine\Bundles\BuiltIn\Logic\Tree\NavigationTreeProvider;
use App\Phine\Database\BuiltIn\NavigationItem;
use App\Phine\Database\BuiltIn\ContentNavigation;
use Phine\Framework\System\Http\Request;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\BackendRouter;
use Phine\Bundles\Core\Modules\Backend\Overview;

class NavigationTree extends BackendModule
{
    /**
     *
     * @var ContentNavigation
     */
    protected $navigation;

    /**
     *
     * @var NavigationItem
     */
    private $item;

    /**
     *
     * @var PageTreeProvider
     */
    private $tree;
    protected $hasItems = false;

    protected function Init()
    {
        
        $this->navigation = new ContentNavigation(Request::GetData('navigation'));
        if (!$this->navigation->Exists())
        {
            Response::Redirect(BackendRouter::ModuleUrl(new Overview()));
            return true;
        }
        $this->tree = new NavigationTreeProvider($this->navigation);
        $this->item = $this->tree->TopMost();
        $this->hasItems = (bool)$this->item;
        return parent::Init();
    }

    protected function CreateFormUrl()
    {
        $module = new NavigationItemForm();
        $args = array('navigation'=> $this->navigation->GetID());
        return BackendRouter::ModuleUrl($module, $args);
        /*
        $module = new PageForm();
        $args = array('site' => $this->site->GetID());
        return BackendRouter::ModuleUrl($module, $args)
         * ;
         */
    }

    protected function NextItem()
    {
        $item = $this->item;
        $this->item= $this->tree->NextOf($this->item);
        return $item;
    }
    
    protected function BackLink()
    {
        return BackendRouter::ContentTreeUrl($this->navigation->GetContent());
    }
    
    


    protected function JsonUrl()
    {
        return BackendRouter::AjaxUrl(new JsonNavigationTree());
    }

}
