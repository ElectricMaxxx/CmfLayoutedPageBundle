<?php

namespace Cmf\LayoutedPageBundle\Admin;

use Cmf\LayoutedPageBundle\Document\PHPCR\Layout;
use Cmf\LayoutedPageBundle\Document\PHPCR\LayoutGrid;
use Cmf\LayoutedPageBundle\Document\PHPCR\LayoutUnit;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LayoutUnitAdminController extends AbstractBlockAdmin
{

    protected $baseRouteName = 'sonata_layout_unit';

    protected $baseRoutePattern = 'layout_unit';

    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text')
            ->add('name', 'text')
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('form.group_general')
                ->add('title', 'text')
                ->add('className', 'text');
    }

    /**
     * {@inheritDoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title', 'doctrine_phpcr_string');
    }


    /**
     * @param LayoutUnit $document
     * @return mixed|void
     */
    public function prePersist($document)
    {
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);
    }

    /**
     * @param LayoutUnit $document
     * @return mixed|void
     */
    public function preUpdate($document)
    {
        //getting the node name from title
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);
    }
}
 