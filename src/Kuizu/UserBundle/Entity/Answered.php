<?php

namespace Kuizu\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answered
 */
class Answered
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Kuizu\UserBundle\Entity\User
     */
    private $user;

    /**
     * @var \Kuizu\GameBundle\Entity\Question
     */
    private $question;

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
     * Set user
     *
     * @param \Kuizu\UserBundle\Entity\User $user
     * @return Answered
     */
    public function setUser(\Kuizu\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Kuizu\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set question
     *
     * @param \Kuizu\GameBundle\Entity\Question $question
     * @return Answered
     */
    public function setQuestion(\Kuizu\GameBundle\Entity\Question $question = null)
    {
        $this->question = $question;
    
        return $this;
    }

    /**
     * Get question
     *
     * @return \Kuizu\GameBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}