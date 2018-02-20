<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;

use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Bundles\BuiltIn\Modules\Frontend\Div;
use App\Phine\Database\BuiltIn\ContentContainer;
use App\Phine\Database\BuiltIn\ContentContainerSchema;
use Phine\Bundles\BuiltIn\Modules\Frontend;
use App\Phine\Database\Core\Container;
use App\Phine\Database\Access;

use Phine\Framework\FormElements\Fields\Select;

/**
 * The form for a container element
 */
class ContainerForm extends ContentForm
{
    
    /**
     * The content container
     * @var ContentContainer
     */
    private $container;
    /**
     * The schema of the element
     * @return ContentContainerSchema
     */
    protected function ElementSchema()
    {
        return ContentContainer::Schema();
    }

    /**
     * Returns The div frontend module
     * @return Div
     */
    protected function FrontendModule()
    {
        return new Frontend\Container();
    }

    /**
     * Initializes the form
     */
    protected function InitForm()
    {
        $this->container = $this->LoadElement();
        $this->AddContainerField();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddSubmit();
    }
    
    private function AddContainerField()
    {
        $name = 'Container';
        $value = $this->container->Exists() ? $this->container->GetContainer()->GetID() : ''; 
        $select = new Select($name, $value);
        $select->AddOption('', Trans('Core.PleaseSelect'));
        
        $sql = Access::SqlBuilder();
        $tblContainer = Container::Schema()->Table();
        $orderBy = $sql->OrderList($sql->OrderAsc($tblContainer->Field('Name')));
        $containers = Container::Schema()->Fetch(false, null, $orderBy);
        foreach ($containers as $container)
        {
            $select->AddOption($container->GetID(), $container->GetName());
        }
        $this->AddField($select);
        $this->SetRequired($name);
    }

    /**
     * Sets the specific container and returns the content element
     * @return ContentContainer
     */
    protected function SaveElement()
    {
        $this->container->SetContainer(new Container($this->Value('Container')));
        return $this->container;
    }
}

