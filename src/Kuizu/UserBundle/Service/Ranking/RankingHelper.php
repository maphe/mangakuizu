<?php

namespace Kuizu\UserBundle\Service\Ranking;

use Kuizu\UserBundle\Service\Ranking\PagerHelper;

class RankingHelper
{
    /** @var PagerHelper */
    protected $pager;

    /** @var int */
    protected $start_count;

    /** @var int */
    protected $total_count;

    /** @var array */
    protected $users;

    public function __construct(PagerHelper $pager)
    {
        $this->pager = $pager;
    }

    /**
     * @param PagerHelper $pager
     * @return $this
     */
    public function setPager(PagerHelper $pager)
    {
        $this->pager = $pager;
        return $this;
    }

    /**
     * @return PagerHelper
     */
    public function getPager()
    {
        return $this->pager;
    }

    /**
     * @param $nb
     * @return $this
     */
    public function setStartCount($nb)
    {
        $this->start_count = $nb;
        return $this;
    }

    /**
     * @return int
     */
    public function getStartCount()
    {
        return $this->start_count;
    }

    /**
     * @param $nb
     * @return $this
     */
    public function setTotalCount($nb)
    {
        $this->total_count = $nb;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * @param array $users
     * @return $this
     */
    public function setUsers(array $users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }
}