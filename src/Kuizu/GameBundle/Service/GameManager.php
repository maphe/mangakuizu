<?php

namespace Kuizu\GameBundle\Service;

use Doctrine\ORM\EntityManager;
use Kuizu\GameBundle\Entity\Manga;
use Kuizu\GameBundle\Entity\Question;
use Kuizu\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class GameManager
{
    const SESSION_PICKED_MANGA = 'picked_manga';
    const SESSION_CURRENT_QUESTION = 'current_question';

    /** @var EntityManager */
    protected $em;

    /** @var SessionInterface  */
    protected $session;

    /** @var QuestionPicker */
    protected $questionPicker;

    /** @var AnswerVoter */
    protected $answerVoter;

    /** @var ScoreManager */
    protected $scoreManager;

    public function __construct(
        EntityManager    $em,
        SessionInterface $session,
        QuestionPicker   $picker,
        AnswerVoter      $voter,
        ScoreManager     $scorer
    ) {
        $this->em             = $em;
        $this->session        = $session;
        $this->questionPicker = $picker;
        $this->answerVoter    = $voter;
        $this->scoreManager   = $scorer;
    }

    public function setCurrentManga(Manga $manga = null)
    {
        $this->session->set(self::SESSION_PICKED_MANGA, $manga);
    }

    public function getCurrentManga()
    {
        $manga = $this->session->get(self::SESSION_PICKED_MANGA);
        return (null === $manga) ? null : $this->em->merge($manga);
    }

    public function setCurrentQuestion(Question $question = null)
    {
        $this->session->set(self::SESSION_CURRENT_QUESTION, $question);
    }

    public function getCurrentQuestion()
    {
        $question = $this->session->get(self::SESSION_CURRENT_QUESTION);
        return (null === $question) ? null : $this->em->merge($question);
    }

    public function getQuestionSmartly(User $user)
    {
        $question = $this->getCurrentQuestion();
        if (null === $question) {
            $question = $this->pickQuestion($user);
        }
        // No more unanswered question in current manga
        if ((null === $question) && (null !== $this->getCurrentManga())) {
            $this->setCurrentManga(null);
            $question = $this->pickQuestion($user);
        }
        return $question;
    }

    public function pickQuestion($user)
    {
        $question = $this->questionPicker->pick($user, $this->getCurrentManga());
        $this->setCurrentQuestion($question);
        return $question;
    }

    public function processUserAnswer(User $user, Question $question, array $answers)
    {
        $score = $this->answerVoter->evaluate($question, $answers);
        if (true === $this->answerVoter->isCorrect($score)) {
            $this->scoreManager->validateUserAnswer($user, $question);
            return true;
        }
        return false;
    }
}