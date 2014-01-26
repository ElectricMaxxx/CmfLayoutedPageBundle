<?php

namespace Cmf\LayoutedPageBundle\Admin;

use Cmf\LayoutedPageBundle\Document\PHPCR\Layout;
use Cmf\LayoutedPageBundle\Document\PHPCR\LayoutGrid;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LayoutGridAdminController extends AbstractBlockAdmin
{

    protected $baseRouteName = 'sonata_layout_grid';

    protected $baseRoutePattern = 'layout_grid';

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
     * @param LayoutGrid $document
     * @return mixed|void
     */
    public function prePersist($document)
    {

        //store them in the base path first
        $parent = $this->getModelManager()->find(null, '/cms/layout/layouts');
        $document->setParent($parent);

        //getting the node name from title
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);
    }

    /**
     * @param Layout $document
     * @return mixed|void
     */
    public function preUpdate($document)
    {
        //getting the node name from title
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);
    }
}
 