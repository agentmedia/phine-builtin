<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;

use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Bundles\BuiltIn\Modules\Frontend\Navigation;
use App\Phine\Database\BuiltIn\ContentNavigation;
use Phine\Framework\FormElements\Fields\Input;
use Phine\Framework\System\Http\Response;
use Phine\Bundles\Core\Logic\Routing\BackendRouter;
use Phine\Framework\Validation\DatabaseCount;
class NavigationForm extends ContentForm
{
    
    /**
     * The currently edited content navigation
     * @var ContentNavigation
     */
    private $navi;
    protected function ElementSchema()
    {
        return ContentNavigation::Schema();
    }

    protected function FrontendModule()
    {
        return new Navigation();
    }

    protected function InitForm()
    {
        $this->navi = $this->LoadElement();
        $this->AddNameField();
        $this->AddTemplateField();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddCacheLifetimeField();
        $this->AddSubmit();
    }
    
    private function AddNameField()
    {
        $name = 'Name';
        $this->AddField(Input::Text($name, $this->navi->GetName()));
        $this->SetRequired($name);
        $this->AddValidator($name, DatabaseCount::UniqueField($this->navi, $name));
        
    }
    

    protected function SaveElement()
    {
        $this->navi->SetName($this->Value('Name'));
        return $this->navi;
    }
    
    protected function AfterSave()
    {
        $params = array('navigation'=>$this->navi->GetID());
        Response::Redirect(BackendRouter::ModuleUrl(new NavigationTree(), $params));
    }

}

