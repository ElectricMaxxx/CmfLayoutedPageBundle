<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Cmf\LayoutedPageBundle\Model\ClassNameAwareInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * A unit works like columns in a table. A grid (like a row) can contain several units. A unit will contain
 * containers as children to map content to the layout.
 *
 * Class LayoutUnit
 * @package Cmf\LayoutedPageBundle\Document\PHPCR
 */
class LayoutUnit extends BaseNode implements ClassNameAwareInterface
{

    /**
     * @var string
     */
    private $className;

    /**
     * @var LayoutGrid[] $grids
     */
    private $grids;

    /**
     * @var LayoutContainer[] $container
     */
    private $container;

    public function __construct()
    {
        $this->grids = new ArrayCollection();
        $this->container = new ArrayCollection();
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }


    /**
     * Every container, unit or grid layout class can have a property className
     * when construction the grid this class wil be added to the div.
     *
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param \Cmf\LayoutedPageBundle\Document\PHPCR\LayoutContainer[] $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return \Cmf\LayoutedPageBundle\Document\PHPCR\LayoutContainer[]
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param LayoutContainer $container
     */
    public function addContainer(LayoutContainer $container)
    {
        $this->container->add($container);
    }

    /**
     * @param LayoutContainer $container
     */
    public function removeContainer(LayoutContainer $container)
    {
        $this->container->removeElement($container);
    }

    /**
     * @param \Cmf\LayoutedPageBundle\Document\PHPCR\LayoutGrid[] $grids
     */
    public function setGrids($grids)
    {
        $this->grids = $grids;
    }

    /**
     * @return \Cmf\LayoutedPageBundle\Document\PHPCR\LayoutGrid[]
     */
    public function getGrids()
    {
        return $this->grids;
    }

    /**
     * @param LayoutGrid $grid
     */
    public function addGrid(LayoutGrid $grid)
    {
        $this->grids->add($grid);
    }

    /**
     * @param LayoutGrid $grid
     */
    public function removeGrid(LayoutGrid $grid)
    {
        $this->grids->removeElement($grid);
    }
}
 