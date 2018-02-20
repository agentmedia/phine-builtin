<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;

use Phine\Bundles\BuiltIn\Modules\Frontend\Repeater;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use App\Phine\Database\BuiltIn\ContentRepeater;
use App\Phine\Database\BuiltIn\ContentRepeaterSchema;

/**
 * Backend form for the reeater
 */
class RepeaterForm extends ContentForm
{
    /**
     * The repeater object
     * @var ContentRepeater
     */
    protected $repeater;
    
    /**
     * Gets the associated repeater database schema
     * @return ContentRepeaterSchema
     */
    protected function ElementSchema()
    {
        return ContentRepeater::Schema();
    }
    
    /**
     * The repeater frontend module
     * @return Repeater
     */
    protected function FrontendModule()
    {
        return new Repeater();
    }
    
    /**
     * Initializes the form
     */
    protected function InitForm()
    {
        $this->repeater = $this->LoadElement();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddTemplateField();
        $this->AddSubmit();
    }

    /**
     * Saves the element
     * @return type
     */
    protected function SaveElement()
    {
        //nothing to save, here
        return $this->repeater;
    }
}

