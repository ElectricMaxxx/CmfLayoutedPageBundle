<?php

namespace Cmf\LayoutedPageBundle\Model;

interface IdentifierAwareInterface
{
    /**
     * Some parts of the layout will get the chance to set its identifier.
     *
     * @return string
     */
    public function getIdentifier();
}
 