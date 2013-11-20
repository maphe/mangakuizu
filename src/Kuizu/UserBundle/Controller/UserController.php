<?php

namespace Kuizu\UserBundle\Controller;

use Kuizu\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function detailAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();

        $rank = $em->getRepository('KuizuUserBundle:User')->getRankPosition($user->getScore());
        //$questions = $em->getRepository('KuizuGameBundle:Question')->findByAuthor($id);
        $nb_questions = $em->getRepository('KuizuGameBundle:Question')->countByAuthor($user);
        $nb_answers = $em->getRepository('KuizuUserBundle:Answered')->countByUser($user);

        return $this->render('KuizuUserBundle:User:detail.html.twig',
            array(
                'user' => $user,
                'rank' => $rank,
                'nb_questions' => $nb_questions,
                'nb_answers' => $nb_answers
            )
        );
    }

}
