<?php

namespace Cmf\LayoutedPageBundle\Doctrine\PHPCR;

use Doctrine\Common\Collections\ArrayCollection;

class LayoutedPageBlock
{
    /**
     * @var Layout
     */
    private $layout;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection | LayoutContainerReferenceBlock[]
     */
    private $children;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

}
 