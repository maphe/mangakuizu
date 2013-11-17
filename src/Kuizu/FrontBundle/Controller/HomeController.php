<?php

namespace Kuizu\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('KuizuFrontBundle:Home:index.html.twig');
    }
}
