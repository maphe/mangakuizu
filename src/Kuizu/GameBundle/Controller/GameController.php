<?php

namespace Kuizu\GameBundle\Controller;

use Kuizu\GameBundle\Form\Type\AnswerType;
use Kuizu\GameBundle\Form\Type\MangaChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GameController extends Controller
{
    const SESSION_PICKED_MANGA = 'picked_manga';

    public function playAction(Request $request)
    {
        $mangaChoiceForm = $this->createForm(new MangaChoiceType());
        $mangaChoiceForm->handleRequest($request);

        if ($mangaChoiceForm->isValid() && $mangaChoiceForm->get('pick')->isClicked()) {
            $request->getSession()
                ->set(self::SESSION_PICKED_MANGA, $mangaChoiceForm->getData()['manga']);
        }
        $manga = $request->getSession()->get(self::SESSION_PICKED_MANGA);

        $question = $this->get('kuizugame.question.picker')
            ->pick($this->getUser(), $manga);

        $gameForm = $this->createForm(new AnswerType($question));

        return $this->render('KuizuGameBundle:Game:play.html.twig', [
            'choice_form' => $mangaChoiceForm->createView(),
            'game_form'   => $gameForm->createView(),
            'question'    => $question
        ]);
    }

    public function askAction()
    {
    }

}
