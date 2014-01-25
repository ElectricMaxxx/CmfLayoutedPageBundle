<?php

namespace Cmf\LayoutedPageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LayoutGridCollectionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text', array('label'=>'form.label_title'), 'form.label_title')
                ->add('className', 'text', array('label' => 'form.label_class_name'), 'form.label_className');
        parent::buildForm($builder, $options);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                'data_class'    => 'Cmf\LayoutedPageBundle\Document\PHPCR\LayoutGrid'
            )
        );
    }

    public function getParent()
    {
        return 'collection';
    }

    public function getName()
    {
        return 'grid_collection';
    }
}
 