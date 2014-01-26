<?php

namespace Cmf\LayoutedPageBundle\Admin;

use Cmf\LayoutedPageBundle\Document\PHPCR\Layout;
use Cmf\LayoutedPageBundle\Form\Type\LayoutGridCollectionType;
use Sonata\DoctrinePHPCRAdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LayoutAdminController extends AbstractBlockAdmin
{
    protected $baseRouteName = 'sonata_layout';

    protected $baseRoutePattern = 'layout';

    /**
     * Service name of the sonata_type_collection service to embed
     *
     * @var string
     */
    protected $embeddedGridAdminCode;

    /**
     * Configure the service name (admin_code) of the admin service for the grids
     *
     * @param string $adminCode
     */
    public function setEmbeddedGridsAdmin($adminCode)
    {
        $this->embeddedGridAdminCode = $adminCode;
    }

    /**
     * {@inheritDoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', 'text')
            ->add('name')
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title', 'doctrine_phpcr_string');
    }

    /**
     * {@inheritDoc}
     */
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
                        'edit' => 'inline',
                        'inline' => 'table',
                        'admin_code' => $this->embeddedGridAdminCode,
                         'sortable'  => 'position',
                     )
                )
            ->end();
    }

    /**
     * @param Layout $document
     * @return void
     */
    public function prePersist($document)
    {
        //getting the parent
        $parent = $this->getModelManager()->find(null, '/cms/layout/layouts');
        $document->setParent($parent);

        //getting the node name from title
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);

        //set the parent documents for all grids to the current document
        foreach ($document->getGrids() as $grid) {
            $grid->setParentDocument($document);
            $grid->setName('Grid-'.$document->clearStringForName($grid->getTitle()));
        }
    }

    /**
     * @param Layout $document
     * @return void
     */
    public function preUpdate($document)
    {
        //getting the node name from title
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);

        //set the parent documents for all grids to the current document
        foreach ($document->getGrids() as $grid) {
            $grid->setParentDocument($document);
            $grid->setName('Grid-'.$document->clearStringForName($grid->getTitle()));
        }
    }

    public function getExportFormats()
    {
        return array();
    }
}
 