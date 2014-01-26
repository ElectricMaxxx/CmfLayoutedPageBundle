<?php

namespace Cmf\LayoutedPageBundle\Document\PHPCR;

use Sonata\BlockBundle\Model\BlockInterface;

/**
 * This class will contain all properties that the layout class will have in common.
 *
 * Class BaseLayout
 * @package Cmf\LayoutedPageBundle\Document\PHPCR
 */
abstract class BaseNode
{
    private $id;

    private $node;

    private $parentDocument;

    private $path;

    private $title;

    private $name;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $node
     */
    public function setNode($node)
    {
        $this->node = $node;
    }

    /**
     * @return mixed
     */
    public function getNode()
    {
        return $this->node;
    }

    /**
     * @param mixed $parent
     */
    public function setParentDocument($parent = null)
    {
        $this->parentDocument = $parent;
    }

    /**
     * @return mixed
     */
    public function getParentDocument()
    {
        return $this->parentDocument;
    }

    /**
     * @param $parent
     */
    public function setParent($parent)
    {
        $this->setParentDocument($parent);
    }

    /**
     * @return BaseNode |null
     */
    public function getParent()
    {
        if ($this->getParentDocument() instanceof BlockInterface) {
            return $this->getParentDocument();
        }

        return null;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * this method will clear a string to use it as an node nome or in a url
     *
     * @param string $string
     * @return string $string
     */
    public function clearStringForName($string)
    {
        $sourceChars = ['Ö', 'ö', 'Ä', 'ä', 'Ü', 'ü', 'ß', ' ', '/'];
        $destinationChars = ['Oe', 'oe', 'Ae', 'ae', 'Ue', 'ue', 'ss', '-', '-'];

        foreach ($sourceChars as $key => $sourceChar) {
            $string = str_replace($sourceChar, $destinationChars[$key], $string);
        }

        return $string;
    }

}
 