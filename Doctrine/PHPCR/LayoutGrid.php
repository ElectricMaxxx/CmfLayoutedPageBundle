<?php

namespace Cmf\LayoutedPageBundle\Doctrine\PHPCR;

use Cmf\LayoutedPageBundle\Model\ClassNameAwareInterface;

/**
 * All grids can contain more units. These grids are just a simple wrapper for them, a helper to structure
 * content in the frontend view.
 *
 * Class LayoutGrid
 * @package Cmf\LayoutedPageBundle\Doctrine\PHPCR
 */
class LayoutGrid implements ClassNameAwareInterface
{

    /**
     * You can set an extra class name to the grid container
     *
     * @var string
     */
    private $className;

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

}
 