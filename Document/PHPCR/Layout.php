<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * A Layout can contain several grids, which contain units, which contain container. Content can
 * be mapped to containers only.
 *
 * A single Layout contain several grids, which can be rows for example.
 * Every Grid will get a sortOrder property to get them in the right order.
 *
 * Class Layout
 * @package Cmf\LayoutedPageBundle\Document\PHPCR
 */
class Layout extends BaseNode
{
    /**
     * @var LayoutGrid[]
     */
    private $grids;

    /**
     * @var string
     */
    private $description;

    public function __construct()
    {
        $this->grids = new ArrayCollection();
    }

    /**
     * will add a single child grid to the current layout
     *
     * @param LayoutGrid $grid
     */
    public function addGrid(LayoutGrid $grid)
    {
        $this->grids->add($grid);
    }

    /**
     * removes a grid or row from the layout
     *
     * @param LayoutGrid $grid
     */
    public function removeGrid(LayoutGrid $grid)
    {
        $this->grids->removeElement($grid);
    }

    /**
     * @param $grids
     */
    public function setGrids($grids)
    {
        $this->grids = $grids;
    }

    /**
     * @return LayoutGrid[]
     */
    public function getGrids()
    {
        return $this->grids;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


}
 