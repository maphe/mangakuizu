<?php

namespace Kuizu\GameBundle\Service;

use Doctrine\ORM\EntityManager;
use Kuizu\GameBundle\Entity\Question;
use Kuizu\UserBundle\Entity\Answered;
use Kuizu\UserBundle\Entity\User;

class ScoreManager {

    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Return the full manga list with user score
     *
     * @param string|\Symfony\Component\Security\Core\User\User $user
     * @return array
     */
    public function getMangaTable($user)
    {
        $mangas = $this->em
            ->getRepository('KuizuGameBundle:Manga')
            ->findWithQuestions();

        $table = array();

        foreach ($mangas as $manga) {
            $row = array('manga' => $manga);
            if ($user instanceof User) {
                $row['score'] = $this->em
                    ->getRepository('KuizuUserBundle:Answered')
                    ->countByUserAndManga($user, $manga);
            } else {
                $row['score'] = 0;
            }
            $row['nb_questions'] = $this->em
                ->getRepository('KuizuGameBundle:Question')
                ->countByManga($manga);
            $row['progress'] = number_format(($row['nb_questions'] > 0) ? $row['score']*100/$row['nb_questions'] : 0, 2);

            $table[] = $row;
        }

        return $table;
    }

    public function validateUserAnswer(User $user, Question $question)
    {
        $answered = new Answered();
        $answered->setUser($user);
        $answered->setQuestion($question);
        $this->em->persist($answered);

        $user->incrementScore($question->getPoints());
        $this->em->persist($user);

        $this->em->flush();
    }
}