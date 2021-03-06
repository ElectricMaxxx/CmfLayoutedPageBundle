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

    protected $unitAdminCode;

    public function setEmbeddedUnitsAdmin($adminCode)
    {
        $this->unitAdminCode = $adminCode;
    }

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
                ->add('className', 'text')
            ->with('form.group_units')
                ->add('units','sonata_type_collection',
                array(
                    'by_reference' => false,
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'admin_code' => $this->unitAdminCode,
                    'sortable'  => 'position',
                ))
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
     * @param LayoutGrid $document
     * @return mixed|void
     */
    public function prePersist($document)
    {
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);

        //set the parent document for each embedded unit and its name
        foreach ($document->getUnits() as $unit) {
            $unit->setParentDocument($document);
            $unit->setName('Unit-'.$document->clearStringForName($unit->getTitle()));
        }
    }

    /**
     * @param LayoutGrid $document
     * @return mixed|void
     */
    public function preUpdate($document)
    {
        //getting the node name from title
        $name = $document->clearStringForName($document->getTitle());
        $document->setName($name);

        //set the parent document for each embedded unit and its name
        foreach ($document->getUnits() as $unit) {
            $unit->setParentDocument($document);
            $unit->setName('Unit-'.$document->clearStringForName($unit->getTitle()));
        }

    }
}
 