<?php

namespace Kuizu\UserBundle\Service\Ranking;

class PagerHelper
{
    /** @var int */
    protected $current_page;

    /** @var int */
    protected $nb_pages;

    /** @var int */
    protected $nb_elements_by_page;

    /** @var string */
    protected $target_route_id;

    /**
     * @param $page
     * @return $this
     */
    public function setCurrentPage($page)
    {
        $this->current_page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->current_page;
    }

    /**
     * @param $nb
     * @return $this
     */
    public function setNbPages($nb)
    {
        $this->nb_pages = $nb;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbPages()
    {
        return $this->nb_pages;
    }

    /**
     * @param $nb
     * @return $this
     */
    public function setNbElementsByPage($nb)
    {
        $this->nb_elements_by_page = $nb;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbElementsByPage()
    {
        return $this->nb_elements_by_page;
    }

    /**
     * @param $route
     * @return $this
     */
    public function setTargetRouteId($route)
    {
        $this->target_route_id = $route;
        return $this;
    }

    /**
     * @return string
     */
    public function getTargetRouteId()
    {
        return $this->target_route_id;
    }
}