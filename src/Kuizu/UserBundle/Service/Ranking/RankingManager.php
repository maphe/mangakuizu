<?php

namespace Kuizu\UserBundle\Service\Ranking;

use Symfony\Component\Security\Core\SecurityContext;
use Kuizu\UserBundle\Entity\User;
use Kuizu\UserBundle\Service\Ranking\RankingHelper;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;

class RankingManager
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var SecurityContext
     */
    protected $context;

    /**
     * @var Request
     */
    protected $http_request;

    /**
     * @var RankingHelper
     */
    protected $ranking;

    public function __construct(
        EntityManager $em,
        SecurityContext $context,
        RankingHelper $ranking,
        array $params
    ) {
        $this->em = $em;
        $this->context = $context;
        $this->ranking = $ranking;
        $this->ranking->getPager()
            ->setNbElementsByPage($params['elem_by_page'])
            ->setTargetRouteId($params['route_id']);
    }

    /**
     * @param $page
     * @return RankingHelper
     */
    public function getRankingPage($page)
    {
        if (ctype_digit((string)$page) && ($page > 0)) {
            return $this->getPage($page);
        } else if ($page === 'me') {
            if (!$this->context->isGranted('ROLE_USER')) {
                // @todo throw exception
            }
            return $this->getMyPositionPage($this->context->getToken()->getUser());
        } else {
            // @todo throw exception
        }
    }

    /**
     * @param $num_page
     * @return RankingHelper
     */
    protected function getPage($num_page)
    {
        $elem_by_page = $this->ranking->getPager()->getNbElementsByPage();

        $userRepo = $this->em->getRepository('KuizuUserBundle:User');
        $elements = $userRepo->getRanking($num_page, $this->ranking->getPager()->getNbElementsByPage());
        $total = $userRepo->getTotalCount();

        $this->ranking->getPager()
            ->setCurrentPage($num_page)
            ->setNbPages(ceil($total / $elem_by_page));

        $this->ranking
            ->setStartCount(($num_page-1)*$elem_by_page + 1)
            ->setTotalCount($total)
            ->setUsers($elements);

        return $this->ranking;
    }

    /**
     * @param User $user
     * @return RankingHelper
     */
    protected function getMyPositionPage(User $user)
    {
        $userRepo = $this->em->getRepository('KuizuUserBundle:User');

        $elem_by_page = $this->ranking->getPager()->getNbElementsByPage();
        $total = $userRepo->getTotalCount();

        $page = $userRepo->getPositionPage($user->getScore(), $user->getId(), $elem_by_page);
        $start_count = (isset($page['before'][0])) ? $userRepo->getRankPosition($page['before'][0]['score']) : 1;

        $this->ranking->getPager()
            ->setCurrentPage(floor($start_count / $elem_by_page) + 1)
            ->setNbPages(ceil($total / $elem_by_page));

        $this->ranking
            ->setStartCount($start_count)
            ->setTotalCount($total)
            ->setUsers(array_merge($page['before'], array($user), $page['after']));

        return $this->ranking;
    }

}
