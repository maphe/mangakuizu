<?php

namespace Kuizu\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MangaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('image', 'file', [
                'data_class' => null,
                'required' => false
            ])
            ->add('summary')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kuizu\GameBundle\Entity\Manga'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kuizu_gamebundle_manga';
    }
}
