<?php

namespace Kuizu\GameBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserAnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        for ($i = 0; $i < $options['question']->getAnswers()->count(); $i++) {
            $builder->add('answer_'.$i, 'text', [
                'label' => 'Réponse '.($i+1)
            ]);
        }

        $builder->add('propose', 'submit', [
            'label' => 'Répondre',
        ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setRequired(['question']);
        $resolver->setAllowedTypes(['question' => '\Kuizu\GameBundle\Entity\Question']);
    }

    public function getName()
    {
        return 'game';
    }
}