<?php

namespace Cmf\LayoutedPageBundle\Doctrine\PHPCR;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * This ReferenceBlock will inhabit the reference between a content block and layout container.
 * The LayoutedPageBlock will store them as children.
 *
 * Class LayoutContainerReferenceBlock
 * @package Cmf\LayoutedPageBundle\Doctrine\PHPCR
 */
class LayoutContainerReferenceBlock
{
    /**
     * @var LayoutContainer
     */
    private $layoutContainer;

    /**
     * @var ArrayCollection
     */
    private $contents;

    public function __construct()
    {
        $this->contents = new ArrayCollection();
    }
}
 