<?php

namespace Cmf\LayoutedPageBundle\Admin;

use Cmf\LayoutedPageBundle\Document\PHPCR\Layout;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LayoutAdminController extends Admin
{
    protected $baseRouteName = 'sonata_layout';

    protected $baseRoutePattern = 'layout';

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text')
            ->add('name')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('form.group_general')
                ->add('title', 'text')
                ->add('description', 'textarea')
            ->end();
    }

    public function prePersist($document)
    {
        //getting the parent
        $parent = $this->getModelManager()->find(null, '/cms/layout/layouts');
        $document->setParent($parent);

        //getting the node name from title
        $name = $document->getTitle();
        $document->setName($name);

    }

    /**
     * @param Layout $document
     * @return mixed|void
     */
    public function preUpdate($document)
    {
        //getting the node name from title
        $name = $document->getTitle();
        $document->setName($name);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title', 'doctrine_phpcr_string');
    }

    public function getExportFormats()
    {
        return array();
    }
}
 