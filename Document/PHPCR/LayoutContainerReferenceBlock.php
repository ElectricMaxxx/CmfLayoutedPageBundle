<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Doctrine\Common\Collections\ArrayCollection;
use Sonata\BlockBundle\Model\BlockInterface;

/**
 * This ReferenceBlock will inhabit the reference between ContentBlocks and LayoutContainer.
 *
 *
 * Class LayoutContainerReferenceBlock
 * @package Cmf\LayoutedPageBundle\Document\PHPCR
 */
class LayoutContainerReferenceBlock extends BaseNode
{
    /**
     * Every LayoutContainerReferenceBlock need a LayoutContainer. This is the place where to
     * render the blocks that are stored in the contents arrayCollection.
     *
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

    /**
     * @param BlockInterface $content
     */
    public function removeContent(BlockInterface $content)
    {
        $this->contents->removeElement($content);
    }

    /**
     * @param BlockInterface $content
     */
    public function addContent(BlockInterface $content)
    {
        $this->contents->add($content);
    }

    /**
     * @param ArrayCollection $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return ArrayCollection
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param LayoutContainer $layoutContainer
     */
    public function setLayoutContainer($layoutContainer)
    {
        $this->layoutContainer = $layoutContainer;
    }

    /**
     * @return LayoutContainer
     */
    public function getLayoutContainer()
    {
        return $this->layoutContainer;
    }


}
 