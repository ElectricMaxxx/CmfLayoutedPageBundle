<?php

namespace Cmf\LayoutedPageBundle\Model;

interface ClassNameAwareInterface
{
    /**
     * Every container, unit or grid layout class can have a property className
     * when construction the grid this class wil be added to the div.
     *
     * @return string
     */
    public function getClassName();
}
 