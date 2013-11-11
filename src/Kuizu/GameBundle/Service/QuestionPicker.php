<?php

namespace Kuizu\GameBundle\Service;

use Doctrine\ORM\EntityManager;
use Kuizu\GameBundle\Entity\Manga;
use Kuizu\GameBundle\Entity\Question;
use Kuizu\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;
use Symfony\Component\Security\Core\User\UserInterface;

class QuestionPicker
{
    /** @var EntityManager */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Pick one random question
     *
     * @param $user
     * @param Manga $manga
     * @return Question
     */
    public function pick($user, Manga $manga = null)
    {
        $exclude = [];
        if ($user instanceof User) {
            $exclude = $this->em
                ->getRepository('KuizuUserBundle:Answered')
                ->getQuestionIdsByUser($user);
        }

        return $this->em
            ->getRepository('KuizuGameBundle:Question')
            ->findOneRandomlyByManga($manga, $exclude);
    }
}