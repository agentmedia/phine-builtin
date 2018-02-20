<?php
namespace Phine\Bundles\BuiltIn\Modules\Backend;
use App\Phine\Database\BuiltIn\ContentNavigation;
use App\Phine\Database\BuiltIn\NavigationItem;
//use App\Phine\Database\BuiltIn\NavigationPage;
use App\Phine\Database\BuiltIn\NavigationUrl;
use Phine\Bundles\BuiltIn\Logic\Tree\NavigationTreeProvider;
use Phine\Bundles\Core\Logic\Tree\TreeBuilder;

use Phine\Bundles\Core\Logic\Module\BackendForm;
use Phine\Framework\FormElements\Fields\Select;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\FormElements\Fields\Textarea;
use Phine\Framework\System\Http\Request;
//use App\Phine\Database\BuiltIn\NavigationParameter;
use App\Phine\Database\Access;
use App\Phine\Database\Core\Page;
use Phine\Bundles\Core\Logic\Tree\PageTreeProvider;
//use Phine\Bundles\BuiltIn\Logic\Navigation\ParameterHelper;
use Phine\Framework\Validation\PhpFilter;
use App\Phine\Database\Core\Site;
use Phine\Bundles\Core\Logic\Routing\BackendRouter;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;

class NavigationItemForm extends BackendForm
{
    /**
     *
     * @var ContentNavigation;
     */
    protected $navi;
    
    /**
     *
     * @var NavigationItem;
     */
    protected $naviItem;
    
    /**
     *
     * @var NavigationTreeProvider
     */
    protected $naviTree;
    
    /**
     *
     * @var TreeBuilder 
     */
    protected $tree;
    
    /**
     *
     * @var NavigationItem
     */
    private $previous = null;
    
    /**
     *
     * @var NavigationItem
     */
    private $parent = null;
    
    /**
     * The page url selector
     * @var PageUrlSelector
     */
    protected $selector;
    
    protected function Init()
    {
        $this->navi =  new ContentNavigation(Request::GetData('navigation'));
        $this->naviTree = new NavigationTreeProvider($this->navi);
        $this->tree = new TreeBuilder($this->naviTree);
        $this->naviItem = new NavigationItem(Request::GetData('item'));
        if (Request::GetData('previous'))
        {
            $this->previous = NavigationItem::Schema()->ByID(Request::GetData('previous'));
        }
        if (Request::GetData('parent'))
        {
            $this->parent = NavigationItem::Schema()->ByID(Request::GetData('parent'));
        }
        $this->AddTypeField();
        $this->AddNameField();
        $this->AddPageItemSelector();
        //$this->AddPageField();
        //$this->AddParametersField();
        $this->AddUrlField();
        $this->AddSubmit();
        return parent::Init();
    }
    
    private function AddPageItemSelector()
    {
        $name = 'PageItem';
        $this->selector = new PageUrlSelector($name, Trans($this->Label($name)), 
                $this->naviItem->GetPageItem());
        if ($this->Value('Type') == 'PageItem')
        {
            $this->selector->SetRequired($this->ErrorPrefix($name));
        }
        $this->Elements()->AddElement($name, $this->selector);
    }
    
    private function AddNameField()
    {
        $name = 'Name';
        $field = Input::Text($name);
        if ($this->naviItem->Exists())
        {
            $field->SetValue($this->naviItem->GetName());
        }
        $this->AddField($field);
        $this->SetRequired($name);
    }
    /*
    private function AddParametersField()
    {
        $name = 'Parameters';
        $params  = ParameterHelper::NavigationItemParams($this->naviItem);
        $value = '';
        
        foreach ($params as $key=>$val)
        {
            if ($value)
            {
                $value .= "\r\n";
            }
            $value .= $key . '=' . $val;
        }
        $this->AddField(new Textarea($name, $value));
        $this->SetTransAttribute($name, 'placeholder');
    }
    */
    private function AddUrlField()
    {
        $name = 'Url';
        $value = '';
        if ($this->naviItem->Exists() && $this->naviItem->GetUrlItem())
        {
            $value = $this->naviItem->GetUrlItem()->GetUrl();
        }
        $this->AddField(Input::Text($name, $value));
        if ($this->Value('Type') == 'UrlItem')
        {
            $this->SetRequired($name);
            $this->AddValidator($name, PhpFilter::Url());
        }
    }
    private function AddTypeField()
    {
        $name = 'Type';
        
        $value = 'PageItem'; 
        if ($this->naviItem->Exists() && $this->naviItem->GetUrlItem())
        {
            $value = 'UrlItem';
        }
        
        $field = new Select($name, $value);
        $field->AddOption('PageItem', Trans('BuiltIn.NavigationItem.Type.PageItem'));
        $field->AddOption('UrlItem', Trans('BuiltIn.NavigationItem.Type.UrlItem'));
        $this->AddField($field);
    }
    /*
    private function AddPageField()
    {
        $name = 'Page';
        $value = '';
        if ($this->naviItem->Exists() && $this->naviItem->GetPageItem())
        {
            $value = $this->naviItem->GetPageItem()->GetPage()->GetID();
        }
        $select = new Select($name, $value);
        $select->AddOption('', Trans('Core.PleaseSelect'));
        $this->AddField($select);
        if ($this->Value('Type') == 'PageItem')
        {
            $this->SetRequired($name);
        }
        $this->AddPageOptions($select);
        
        
    }
    
    private function AddPageOptions(Select $select)
    {
        $tblSites = Site::Schema()->Table();
        $sql = Access::SqlBuilder();
        $order = $sql->OrderList($sql->OrderAsc($tblSites->Field('Name')));
        $sites = Site::Schema()->Fetch(false, null, $order);
        
        foreach ($sites as $site)
        {
            $pageTree = new PageTreeProvider($site);
            $this->AddSiblings($select, $pageTree, $pageTree->TopMost());
        }
    }
    
    private function AddSiblings(Select $select, PageTreeProvider $pageTree, Page $page = null, $level = 0)
    {
        while ($page)
        {
            $indent = '';
            for ($index = 0; $index < $level; ++$index)
            {
                $indent .= '-';
            }
            $select->AddOption($page->GetID(), $indent . '- ' . $page->GetSite()->GetName() . ': ' . $page->GetName());
            $this->AddSiblings($select, $pageTree, $pageTree->FirstChildOf($page), $level + 1);
            $page = $pageTree->NextOf($page);
        }
    }
     *
     */
    
    protected function OnSuccess()
    {
        //$isNew = !$this->naviItem->Exists();
        $this->naviItem->SetName($this->Value('Name'));
        $this->naviItem->SetNavigation($this->navi);
        if (!$this->naviItem->Exists())
        {
            $this->tree->Insert($this->naviItem, $this->parent, $this->previous);
        }
        else
        {
            $this->naviItem->Save();
        }
        if ($this->Value('Type') == 'PageItem')
        {
            $this->naviItem->SetPageItem($this->selector->Save($this->naviItem->GetPageItem()));
            $this->naviItem->Save();
            //$pageItem = $this->SavePageItem();
            //$this->SavePageParams($pageItem);
        }
        else
        {
            $this->SaveUrlItem();
        }
        $this->Redirect();
    }
    /*
    private function SavePageItem()
    {
        
        $urlItem = $this->naviItem->GetUrlItem();
        if ($urlItem)
        {
            $this->naviItem->SetUrlItem(null);
            $this->naviItem->Save();
            $urlItem->Delete();
        }
        $pageItem = $this->naviItem->GetPageItem();
        if (!$pageItem)
        {
            $pageItem = new NavigationPage();
        }
        $pageItem->SetItem($this->naviItem);
        $pageItem->SetPage(new Page($this->Value('Page')));
        $pageItem->Save();
        
        $this->naviItem->SetPageItem($pageItem);
        $this->naviItem->Save();
        
        return $pageItem;
        
         
    }*/
    private function SaveUrlItem()
    {
        $pageItem = $this->naviItem->GetPageItem();
        if ($pageItem)
        {
            $this->naviItem->SetPageItem(null);
            $this->naviItem->Save();
            $pageItem->Delete();
        }
        $urlItem = $this->naviItem->GetUrlItem();
        if (!$urlItem)
        {
            $urlItem = new NavigationUrl();
        }
        $urlItem->SetUrl($this->Value('Url'));
        $urlItem->SetItem($this->naviItem);
        $urlItem->Save();
        $this->naviItem->SetUrlItem($urlItem);
        $this->naviItem->Save();
    }
    /*
    function SavePageParams(NavigationPage $pageItem)
    {
        $this->RemovePageParams($pageItem);
        $strParams = $this->Value('Parameters');
        if(!$strParams)
        {
            return;
        }
        $lines = preg_split('/$\R?^/m', $strParams);
        $previous = null;
        foreach ($lines as $line)
        {
            $previous = $this->SavePageParam($line, $pageItem, $previous);
        }
    }
    
    private function RemovePageParams(NavigationPage $pageItem)
    {
        $sql = Access::SqlBuilder();
        $tblNaviParam = NavigationParameter::Schema()->Table();
        $deleteWhere = $sql->Equals($tblNaviParam->Field('NavigationPage'), $sql->Value($pageItem->GetID()));
        NavigationParameter::Schema()->Delete($deleteWhere);
    }
    
    private function SavePageParam($line, NavigationPage $pageItem, NavigationParameter $previous = null)
    {
        $parts = explode('=', trim($line));
        $param = new NavigationParameter();
        $param->SetName($parts[0]);
        $param->SetValue($parts[1]);
        $param->SetPrevious($previous);
        $param->SetNavigationPage($pageItem);
        $param->Save();
        return $param;
    }
    */
    private function Redirect()
    {
        $args = array('navigation'=>$this->navi->GetID());
        Response::Redirect(BackendRouter::ModuleUrl(new NavigationTree(), $args));
    }
    /**
     * The backlink
     * @return string
     */
    protected function BackLink()
    {
        $module = new NavigationTree();
        $params = array('navigation'=>$this->navi->GetID());
        return BackendRouter::ModuleUrl($module, $params);
    }
    
}

