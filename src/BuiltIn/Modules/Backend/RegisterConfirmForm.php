<?php

namespace Phine\Bundles\BuiltIn\Modules\Backend;
use Phine\Bundles\Core\Logic\Module\ContentForm;
use Phine\Database\BuiltIn\ContentRegisterConfirm;
use Phine\Database\BuiltIn\ContentRegisterConfirmSchema;
use Phine\Bundles\Core\Snippets\FormParts\PageUrlSelector;
use Phine\Framework\FormElements\Fields\Checkbox;
use Phine\Bundles\BuiltIn\Modules\Frontend\RegisterConfirm;
use Phine\Framework\FormElements\Fields\CheckList;
use Phine\Database\Core\Membergroup;
use Phine\Database\BuiltIn\RegisterConfirmMembergroup;
use Phine\Database\Access;
use Phine\Framework\System\Http\Request;
/**
 * The registration confirmation element
 */
class RegisterConfirmForm extends ContentForm
{
    /**
     * The register confirm element
     * @var ContentRegisterConfirm
     */
    protected $confirm;
    
    /**
     * The success url selector
     * @var PageUrlSelector 
     */
    protected $selectorSuccess;
    
    
    /**
     * The error url selector
     * @var PageUrlSelector 
     */
    protected $selectorError;
    
    /**
     * Gets the confirm database schema
     * @return ContentRegisterConfirmSchema
     */
    protected function ElementSchema()
    {
        return ContentRegisterConfirm::Schema();
    }

    protected function FrontendModule()
    {
        return new RegisterConfirm();
    }

    protected function InitForm()
    {
        $this->confirm = $this->LoadElement();
       
        $this->AddSuccessUrlElement();
        $this->AddErrorUrlElement();
        $this->AddGroupField();
        $this->AddActivateField();
        $this->AddTemplateField();
        $this->AddCssClassField();
        $this->AddCssIDField();
        $this->AddSubmit();
    }
    
    private function AddSuccessUrlElement()
    {
        $name = 'SuccessUrl';
        $this->selectorSuccess = new PageUrlSelector($name, Trans($this->Label($name)), $this->confirm->GetSuccessUrl());
        //$this->selectorSuccess->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorSuccess);
    }
    
    
    private function AddErrorUrlElement()
    {
        $name = 'ErrorUrl';
        $this->selectorError = new PageUrlSelector($name, Trans($this->Label($name)), $this->confirm->GetErrorUrl());
        //$this->selectorError ->SetRequired($this->ErrorPrefix($name));
        $this->Elements()->AddElement($name, $this->selectorError);
    }
    
    private function AddGroupField()
    {
        $name = 'Group';
        $tblMemberGroups = Membergroup::Schema()->Table();
        
        $field = new CheckList($name, $this->AssignedGroupIDs());
        $sql = Access::SqlBuilder();
        $order = $sql->OrderList($sql->OrderAsc($tblMemberGroups->Field('Name'))); 
        $groups = Membergroup::Schema()->Fetch(false, null, $order);
        foreach($groups as $group)
        {
            $field->AddOption($group->GetID(), $group->GetName());
        }
        $this->AddField($field);
    }
    
    private function AssignedGroupIDs()
    {
        if (!$this->confirm->Exists())
        {
            return array();
        }
        $confirmGroups = RegisterConfirmMembergroup::Schema()->FetchByConfirm(false, $this->confirm);
        $result = array();
        foreach ($confirmGroups as $confirmGroup)
        {
            $result[] = $confirmGroup->GetMemberGroup()->GetID();
        }
        return $result;
    }
    
    private function AddActivateField()
    {
        $name = 'Activate';
        $field = new Checkbox($name, '1', $this->confirm->GetActivate());
        $this->AddField($field);
    }

    /**
     * Sets the confirm properties as given in the form
     * @return ContentRegisterConfirm
     */
    protected function SaveElement()
    {
        $this->confirm->SetErrorUrl($this->selectorError->Save($this->confirm->GetErrorUrl()));
        $this->confirm->SetSuccessUrl($this->selectorSuccess->Save($this->confirm->GetSuccessUrl()));
        $this->confirm->SetActivate((bool)$this->Value('Activate'));
        return $this->confirm;
    }
    
    /**
     * Attach selected groups; needs to be done her
     */
    protected function AfterSave()
    {
        $this->SaveGroups();
        parent::AfterSave();
    }
    
    /**
     * Saves the groups
     */
    private function SaveGroups()
    {
        $assignedIDs = $this->AssignedGroupIDs();
        $selectedIDs = Request::PostArray('Group');
        $this->ClearMembergroups($selectedIDs);
        foreach ($selectedIDs as $selectedID)
        {
            if (!in_array($selectedID, $assignedIDs))
            {
                $confirmGroup = new RegisterConfirmMembergroup();
                $confirmGroup->SetConfirm($this->confirm);
                $confirmGroup->SetMemberGroup(Membergroup::Schema()->ByID($selectedID));
                $confirmGroup->Save();
            }
        }
    }
    
    private function ClearMembergroups(array $selectedIDs)
    {
        $sql = Access::SqlBuilder();
        $tblConfirmGroup = RegisterConfirmMembergroup::Schema()->Table();
        $where = $sql->Equals($tblConfirmGroup->Field('Confirm'), $sql->Value($this->confirm->GetID()));
        if (count($selectedIDs))
        {
            $where = $where->
                And_($sql->NotIn($tblConfirmGroup->Field('MemberGroup'), $sql->InListFromValues($selectedIDs)));
        }
        RegisterConfirmMembergroup::Schema()->Delete($where);
    }
    
    /**
     * Returns the wording labels for success and error
     * @return string[] Returns the wording labels
     */
    protected function Wordings()
    {
        return array('Success', 'Error');
    }

}

