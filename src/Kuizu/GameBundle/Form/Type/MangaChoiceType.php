<?php

namespace Kuizu\GameBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MangaChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('manga', 'entity', [
            'class'       => 'KuizuGameBundle:Manga',
            'property'    => 'name',
            'empty_value' => 'Tous les manga',
            'expanded'    => false,
            'multiple'    => false,
            'label'       => 'Manga',
            'required'    => false
        ]);

        $builder->add('pick', 'submit', [
            'label' => 'Piocher une question',
        ]);
    }

    public function getName()
    {
        return 'manga_choice';
    }
}