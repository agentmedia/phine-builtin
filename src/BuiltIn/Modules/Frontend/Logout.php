<?php

namespace Phine\Bundles\BuiltIn\Modules\Frontend;
use Phine\Bundles\Core\Logic\Module\FrontendModule;
use Phine\Bundles\BuiltIn\Modules\Backend\LogoutForm;
use Phine\Framework\System\Http\Request;
use Phine\Framework\System\Http\Response;
use App\Phine\Database\BuiltIn\ContentLogout;
use Phine\Bundles\Core\Logic\Routing\FrontendRouter;
/**
 * The logout link used in the frontend
 */
class Logout extends FrontendModule
{
    /**
     * The logout element
     * @var ContentLogout
     */
    private $logout;
    protected $triggerName;
    protected function Init()
    {
        if (self::Guard()->Accessor()->IsUndefined()) {
            return true;
        }
        $this->logout = ContentLogout::Schema()->ByContent($this->Content());
        $this->triggerName =  'Logout-' . $this->Content()->GetID();
        $this->HandlePost();
        return parent::Init();
    }
    
    private function HandlePost()
    {
        if (Request::PostData($this->triggerName))
        {
            self::Guard()->Logout();
            Response::Redirect($this->RedirectUrl());
        }
    }
    
    
    /**
     * Gets the actual redirect url
     * @return string Gets the url after post
     */
    private function RedirectUrl()
    {
        if ($this->logout->GetNextUrl())
        {
            return FrontendRouter::Url($this->logout->GetNextUrl());
        }
        return CurrentUrl();
    }
    
    /**
     * Gets flag telling no child elements are allowed
     * @return boolean Returns false, no child nodes allowed
     */
    public function AllowChildren()
    {
        return false;
    }

    /**
     * Gets the relatedd content form
     * @return LogoutForm
     */
    public function ContentForm()
    {
        return new LogoutForm();
    }
    
    /**
     * Returns flag telling custom templates are allowed
     * @return boolean Returns true; custom templates allowed
     */
    public function AllowCustomTemplates()
    {
        return true;
    }

}

