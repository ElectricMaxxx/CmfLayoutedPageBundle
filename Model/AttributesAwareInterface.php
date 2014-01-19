<?php

namespace Cmf\LayoutedPageBundle\Model;

interface AttributesAwareInterface 
{

    /**
     * You will get the chance to set custom attributes to a part of the layout
     * these attributes will be additional to the className and Identifier
     * They should be stored as key-value-pairs
     *
     * @return array
     */
    public function getAttributes();
}
 