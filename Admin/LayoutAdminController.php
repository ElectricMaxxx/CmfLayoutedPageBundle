<?php

namespace Cmf\LayoutedPageBundle\Admin;

use Cmf\LayoutedPageBundle\Document\PHPCR\Layout;
use Cmf\LayoutedPageBundle\Form\Type\LayoutGridCollectionType;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LayoutAdminController extends Admin
{
    protected $baseRouteName = 'sonata_layout';

    protected $baseRoutePattern = 'layout';

    /**
     * Service name of the sonata_type_collection service to embed
     *
     * @var string
     */
    protected $embeddedAdminCode;

    /**
     * Configure the service name (admin_code) of the admin service for the embedded slides
     *
     * @param string $adminCode
     */
    public function setEmbeddedGridsAdmin($adminCode)
    {
        $this->embeddedAdminCode = $adminCode;
    }


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
            ->with('layout_manager')
                ->add(
                    'grids','sonata_type_collection',
                     array(),
                     array(
                        'edit' => 'standard',
                        'inline' => 'table',
                        'admin_code' => $this->embeddedAdminCode
                     )
                )
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
 