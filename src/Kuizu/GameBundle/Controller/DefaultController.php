<?php

namespace Kuizu\GameBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('KuizuGameBundle:Home:index.html.twig', array('name' => $name));
    }
}
