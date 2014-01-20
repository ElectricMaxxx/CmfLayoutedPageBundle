<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Doctrine\Common\Collections\ArrayCollection;

class LayoutedPageBlock
{
    /**
     * @var Layout
     */
    private $layout;

    /**
     * @var \Document\Common\Collections\ArrayCollection | LayoutContainerReferenceBlock[]
     */
    private $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

}
 