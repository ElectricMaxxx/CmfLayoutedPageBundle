<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Cmf\LayoutedPageBundle\Model\AttributesAwareInterface;
use Cmf\LayoutedPageBundle\Model\ClassNameAwareInterface;
use Cmf\LayoutedPageBundle\Model\IdentifierAwareInterface;


/**
 * A layout container will contain the the content.
 * I will create a LayoutContainerReferenceBlock, which will hold the reference between a
 * layout container and a specific content block.
 *
 * Class LayoutContainer
 * @package Cmf\LayoutedPageBundle\Document\PHPCR
 */
class LayoutContainer extends BaseNode implements
    AttributesAwareInterface,
    ClassNameAwareInterface,
    IdentifierAwareInterface
{
    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @todo need to decide how to persist this array, wanna get several custom attributes
     * @var $attributes[]
     */
    private $attributes = array();

    /**
     * @param mixed $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param string $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
    }

    /**
     * @return string
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }


}
 