<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;

use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Bundles\BuiltIn\Modules\Frontend\Block;
use App\Phine\Database\BuiltIn\ContentBlock;
use Phine\Bundles\BuiltIn\Logic\Enums\BlockTag;
use Phine\Framework\FormElements\Fields\Select;

/**
 * The form for a block element
 */
class BlockForm extends ContentForm
{
    /**
     * The block element
     * @var ContentBlock
     */
    private $block;
    /**
     * Returns the content block database schema
     * @return \Phine\Database\BuiltIn\ContentBlockSchema
     */
    protected function ElementSchema()
    {
        return ContentBlock::Schema();
    }

    /**
     * Returns The block frontend module
     * @return Block
     */
    protected function FrontendModule()
    {
        return new Block();
    }

    /**
     * Initializes the form
     */
    protected function InitForm()
    {
        $this->block = $this->LoadElement();
        $this->AddTagNameField();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddSubmit();
    }
    
    
    private function AddTagNameField()
    {
        $name= 'TagName';
        $select = new Select($name, $this->block->GetTagName());
        $select->AddOption('', Trans('Core.PleaseSelect'));
        $values = BlockTag::AllowedValues();
        foreach ($values as $value)
        {
            $select->AddOption($value, $value);
        }
        $this->AddField($select);
        $this->SetRequired($name);
    }

    /**
     * Returns the adjusted block
     * @return block
     */
    protected function SaveElement()
    {
        $this->block->SetTagName($this->Value('TagName'));
        return $this->block;
    }
}

