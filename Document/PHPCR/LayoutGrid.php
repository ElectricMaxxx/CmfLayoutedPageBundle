<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Cmf\LayoutedPageBundle\Model\ClassNameAwareInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * All grids can contain more units. These grids are just a simple wrapper for them, a helper to structure
 * content in the frontend view.
 *
 * Class LayoutGrid
 * @package Cmf\LayoutedPageBundle\Document\PHPCR
 */
class LayoutGrid extends BaseNode implements ClassNameAwareInterface
{
    /**
     * You can set an extra class name to the grid container
     *
     * @var string
     */
    private $className;

    /**
     * @var LayoutUnit[] | ArrayCollection
     */
    private $units;


    public function __construct()
    {
        $this->units = new ArrayCollection();
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
     * @param LayoutUnit $unit
     */
    public function addUnit(LayoutUnit $unit)
    {
        $this->units->add($unit);
    }

    /**
     * @param LayoutUnit $unit
     */
    public function removeUnit(LayoutUnit $unit)
    {
        $this->units->removeElement($unit);
    }

    /**
     * @param LayoutUnit[] $units
     */
    public function setUnits($units)
    {
        $this->units = $units;
    }

    /**
     * @return LayoutUnit[]
     */
    public function getUnits()
    {
        return $this->units;
    }

}
 