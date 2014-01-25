<?php

namespace Cmf\LayoutedPageBundle\Form\Type;

use Cmf\LayoutedPageBundle\Document\PHPCR\LayoutGrid;
use Symfony\Component\Form\AbstractType;;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LayoutManagerType extends  AbstractType
{
    protected $grids;

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::buildView($view, $form, $options);
    }


    public function getParent()
    {
        return 'collection';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('grids', 'collection', array(
                                    'allow_add' => true,
                                    'type' => new LayoutGridCollectionType()
                                    )
        );
    }


    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'layout_manager';
    }
}
 