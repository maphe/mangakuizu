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
    protected $id;

    /**
     * @var string
     */
    protected $wording;

    /**
     * @var integer
     */
    protected $points;

    /**
     * @var integer
     */
    protected $nbAlertsDuplicate;

    /**
     * @var integer
     */
    protected $nbAlertsAnswer;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var \Kuizu\UserBundle\Entity\User
     */
    protected $author;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $answers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $answered;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->answered = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function initCreationDate()
    {
        $this->setCreatedAt(new \DateTime());
    }

    public function initCounters()
    {
        $this->setNbAlertsAnswer(0);
        $this->setNbAlertsDuplicate(0);
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
     * Inc nbAlertsDuplicate
     *
     * @return Question
     */
    public function incNbAlertsDuplicate()
    {
        $this->setNbAlertsDuplicate($this->getNbAlertsDuplicate() + 1);

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
     * Inc nbAlertsAnswer
     *
     * @return Question
     */
    public function incNbAlertsAnswer()
    {
        return $this->setNbAlertsAnswer($this->getNbAlertsAnswer() + 1);
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
    protected $manga;


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

    /**
     * Add answers
     *
     * @param \Kuizu\GameBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\Kuizu\GameBundle\Entity\Answer $answers)
    {
        $answers->setQuestion($this);
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \Kuizu\GameBundle\Entity\Answer $answers
     */
    public function removeAnswer(\Kuizu\GameBundle\Entity\Answer $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Add answered
     *
     * @param \Kuizu\UserBundle\Entity\Answered $answered
     * @return Question
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