<?php

namespace Kuizu\GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manga
 */
class Manga
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $summary;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $questions;

    /**
     * Constructor
     */
    public function __construct()
    {
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
     * Set name
     *
     * @param string $name
     * @return Manga
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Manga
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Manga
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Manga
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Add questions
     *
     * @param \Kuizu\GameBundle\Entity\Question $questions
     * @return Manga
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
}