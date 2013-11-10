<?php

namespace Kuizu\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MangaController extends Controller
{
    public function listAction()
    {
        return $this->render('KuizuGameBundle:Manga:list.html.twig',
            array(
                'table' => $this->get('kuizugame.score.manager')->getMangaTable($this->getUser())
            )
        );
    }

}
