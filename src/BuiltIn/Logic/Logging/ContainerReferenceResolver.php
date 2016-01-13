<?php

namespace Phine\Bundles\BuiltIn\Logic\Logging;
use Phine\Bundles\Core\Logic\Logging\Interfaces\IContainerReferenceResolver;
use Phine\Database\Core\Content;
use Phine\Database\Core\Container;
use Phine\Database\BuiltIn\ContentContainer;
class ContainerReferenceResolver implements IContainerReferenceResolver
{
    /**
     * Gets a container referenced by a content
     * @param Content $content The content
     * @return Container Returns The referenced container, if exists
     */
    public function GetReferencedContainer(Content $content)
    {
        $contentContainer = ContentContainer::Schema()->ByContent($content);
        return $contentContainer ? $contentContainer->GetContainer() : null;
    }

}

