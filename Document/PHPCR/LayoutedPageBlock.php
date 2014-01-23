<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Doctrine\Common\Collections\ArrayCollection;

class LayoutedPageBlock extends BaseNode
{
    /**
     * @var Layout
     */
    private $layout;

    /**
     * @var ArrayCollection| LayoutContainerReferenceBlock[]
     */
    private $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    /**
     * @param LayoutContainerReferenceBlock $child
     */
    public function removeChild(LayoutContainerReferenceBlock $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * @param LayoutContainerReferenceBlock $child
     */
    public function addChildren(LayoutContainerReferenceBlock $child)
    {
        $this->children->add($child);
    }

    /**
     * @param LayoutContainerReferenceBlock[]|ArrayCollection $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return LayoutContainerReferenceBlock[]|ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Layout $layout
     */
    public function setLayout(Layout $layout)
    {
        $this->layout = $layout;
    }

    /**
     * @return Layout
     */
    public function getLayout()
    {
        return $this->layout;
    }
}
 