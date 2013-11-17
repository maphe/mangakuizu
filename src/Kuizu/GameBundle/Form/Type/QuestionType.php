<?php

namespace Kuizu\GameBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('manga', 'entity', array(
            'class'         => 'KuizuGameBundle:Manga',
            'property'      => 'name',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('m')
                    ->orderBy('m.name', 'ASC');
            },
            'empty_value'   => 'Choisissez un manga',
            'label'         => 'Manga',
            'constraints'   => [
                new NotBlank()
            ]
        ));

        $builder->add('wording', 'text', array(
            'label'       => 'Question',
            'constraints' => [
                new NotBlank()
            ]
        ));

        $builder->add('answers', 'collection', [
            'type'         => new AnswerType(),
            'label'        => 'Réponse(s)',
            'allow_add'    => true,
            'by_reference' => false
        ]);

        $difficulties = [];
        foreach (range(1, 10) as $level) {
            $difficulties[$level] = $level;
        }

        $builder->add('points', 'choice', [
            'choices'     => $difficulties,
            'empty_value' => 'Définissez le nombre de points',
            'label'       => 'Difficulté',
            'required'    => true,
            'constraints' => [
                new NotBlank()
            ]
        ]);

        $builder->add('submit', 'submit', [
            'label' => 'Proposer',
        ]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Kuizu\GameBundle\Entity\Question',
        ]);
    }

    public function getName()
    {
        return 'question';
    }
}