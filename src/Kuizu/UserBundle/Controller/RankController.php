<?php

namespace Kuizu\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RankController extends Controller
{
    public function indexAction($page = 1)
    {
        return $this->render('KuizuUserBundle:Rank:index.html.twig', [
            'ranking' => $this->get('kuizuuser.ranking.manager')->getRankingPage($page)
        ]);
    }

}
