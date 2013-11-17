<?php

namespace Kuizu\GameBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('wording', 'text', [
            'label' => 'Réponse',
            'constraints' => array(
                new NotBlank()
            )
        ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Kuizu\GameBundle\Entity\Answer',
        ]);
    }

    public function getName()
    {
        return 'answer';
    }
}