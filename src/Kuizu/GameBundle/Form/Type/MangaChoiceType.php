<?php

namespace Kuizu\GameBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Kuizu\UserBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

class MangaChoiceType extends AbstractType
{
    /** @var SecurityContextInterface */
    protected $security;

    public function __construct(SecurityContextInterface $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $this->security->getToken()->getUser();
        if (!($user instanceof User)) {
            $user = null;
        }

        $builder->add('manga', 'entity', [
            'class'            => 'KuizuGameBundle:Manga',
            'property'         => 'name',
            'empty_value'      => 'Tous les manga',
            'expanded'         => false,
            'multiple'         => false,
            'label'            => 'Manga',
            'required'         => false,
            'query_builder'    => function(EntityRepository $mangaRepo) use ($user) {
                return $mangaRepo->qbWithQuestions($user);
            }
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