<?php

namespace Phine\Bundles\BuiltIn\Logic\Hooks;
use Phine\Bundles\Core\Logic\Hooks\IDeleteHook;
use App\Phine\Database\BuiltIn\ContentContainer;
use App\Phine\Database\Core\Container;
use Phine\Bundles\Core\Logic\Tree\TreeBuilder;
use Phine\Bundles\Core\Logic\Tree\ContentTreeUtil;
use Phine\Bundles\Core\Logic\Logging\Logger;
use Phine\Bundles\Core\Logic\Logging\Enums\Action;
use Phine\Bundles\Core\Logic\Access\Backend\UserGuard;
use Phine\Bundles\Core\Logic\Module\BackendModule;

/**
 * Implements clean content removal on container deletion
 */
class DeleteContainer implements IDeleteHook 
{
    /**
     * Deletes the container contents related to the container
     * @param Container $item The container to be deleted
     */
    public function BeforeDelete($item)
    {
       $contContainers = ContentContainer::Schema()->FetchByContainer(true, $item);
       $logger = new Logger(BackendModule::Guard()->GetUser());
       foreach ($contContainers as $contContainer)
       {
           $content = $contContainer->GetContent();
           $provider = ContentTreeUtil::GetTreeProvider($content);
           $tree = new TreeBuilder($provider);
           $logger->ReportContentAction($content, Action::Delete());
           $tree->Remove($provider->ItemByContent($content));
       }
    }
}