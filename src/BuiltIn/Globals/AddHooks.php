<?php

use Phine\Bundles\Core\Modules\Backend\JsonPageTree;
use Phine\Bundles\BuiltIn\Logic\Hooks\DeletePageNavigation;
use Phine\Bundles\BuiltIn\Logic\Hooks\DeleteContainer;
use Phine\Bundles\Core\Modules\Backend\ContainerList;

JsonPageTree::AddDeleteHook(new DeletePageNavigation());
ContainerList::AddDeleteHook(new DeleteContainer());