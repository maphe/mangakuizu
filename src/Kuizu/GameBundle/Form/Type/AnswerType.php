<?php

namespace Kuizu\GameBundle\Form\Type;

use Kuizu\GameBundle\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AnswerType extends AbstractType
{
    /** @var Question */
    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        for ($i = 0; $i < $this->question->getAnswers()->count(); $i++) {
            $builder->add('answer_'.$i, 'text', [
                'label' => 'Réponse '.($i+1)
            ]);
        }

        $builder->add('save', 'button', [
            'label' => 'Piocher une question',
        ]);
    }

    public function getName()
    {
        return 'game';
    }
}