<?php

namespace Kuizu\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    private $score;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return User
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Add questions
     *
     * @param \Kuizu\GameBundle\Entity\Question $questions
     * @return User
     */
    public function addQuestion(\Kuizu\GameBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Kuizu\GameBundle\Entity\Question $questions
     */
    public function removeQuestion(\Kuizu\GameBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $answered;


    /**
     * Add answered
     *
     * @param \Kuizu\UserBundle\Entity\Answered $answered
     * @return User
     */
    public function addAnswered(\Kuizu\UserBundle\Entity\Answered $answered)
    {
        $this->answered[] = $answered;

        return $this;
    }

    /**
     * Remove answered
     *
     * @param \Kuizu\UserBundle\Entity\Answered $answered
     */
    public function removeAnswered(\Kuizu\UserBundle\Entity\Answered $answered)
    {
        $this->answered->removeElement($answered);
    }

    /**
     * Get answered
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswered()
    {
        return $this->answered;
    }
}