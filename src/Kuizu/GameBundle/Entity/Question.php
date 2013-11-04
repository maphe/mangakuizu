<?php

namespace Kuizu\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 */
class Question
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $wording;

    /**
     * @var integer
     */
    private $points;

    /**
     * @var integer
     */
    private $nbAlertsDuplicate;

    /**
     * @var integer
     */
    private $nbAlertsAnswer;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \Kuizu\UserBundle\Entity\User
     */
    private $author;


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
     * Set wording
     *
     * @param string $wording
     * @return Question
     */
    public function setWording($wording)
    {
        $this->wording = $wording;
    
        return $this;
    }

    /**
     * Get wording
     *
     * @return string 
     */
    public function getWording()
    {
        return $this->wording;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Question
     */
    public function setPoints($points)
    {
        $this->points = $points;
    
        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set nbAlertsDuplicate
     *
     * @param integer $nbAlertsDuplicate
     * @return Question
     */
    public function setNbAlertsDuplicate($nbAlertsDuplicate)
    {
        $this->nbAlertsDuplicate = $nbAlertsDuplicate;
    
        return $this;
    }

    /**
     * Get nbAlertsDuplicate
     *
     * @return integer 
     */
    public function getNbAlertsDuplicate()
    {
        return $this->nbAlertsDuplicate;
    }

    /**
     * Set nbAlertsAnswer
     *
     * @param integer $nbAlertsAnswer
     * @return Question
     */
    public function setNbAlertsAnswer($nbAlertsAnswer)
    {
        $this->nbAlertsAnswer = $nbAlertsAnswer;
    
        return $this;
    }

    /**
     * Get nbAlertsAnswer
     *
     * @return integer 
     */
    public function getNbAlertsAnswer()
    {
        return $this->nbAlertsAnswer;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Question
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * @var \Kuizu\GameBundle\Entity\Manga
     */
    private $manga;


    /**
     * Set manga
     *
     * @param \Kuizu\GameBundle\Entity\Manga $manga
     * @return Question
     */
    public function setManga(\Kuizu\GameBundle\Entity\Manga $manga = null)
    {
        $this->manga = $manga;
    
        return $this;
    }

    /**
     * Get manga
     *
     * @return \Kuizu\GameBundle\Entity\Manga 
     */
    public function getManga()
    {
        return $this->manga;
    }

    /**
     * Set author
     *
     * @param \Kuizu\UserBundle\Entity\User $author
     * @return Question
     */
    public function setAuthor(\Kuizu\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Kuizu\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}