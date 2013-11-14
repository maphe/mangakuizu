<?php

namespace Kuizu\GameBundle\Controller;

use Kuizu\GameBundle\Form\Type\AnswerType;
use Kuizu\GameBundle\Form\Type\MangaChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GameController extends Controller
{
    public function playAction(Request $request)
    {
        $game = $this->get('kuizugame.game.manager');

        $mangaChoiceForm = $this->createForm(
            'manga_choice',
            ['manga' => $game->getCurrentManga()]
        );
        $mangaChoiceForm->handleRequest($request);

        if ($mangaChoiceForm->isValid() && $mangaChoiceForm->get('pick')->isClicked()) {
            $manga = $mangaChoiceForm->getData()['manga'];
            $game->setCurrentManga($manga);

            $game->pickQuestion($this->getUser());

            return $this->redirect($this->generateUrl('kuizu_game_play'));
        }

        $question = $game->getQuestionSmartly($this->getUser());
        if (null === $question) {
            // @todo : no more question
        }

        $gameForm = $this->createForm(new AnswerType(), null, ['question' => $question]);
        $gameForm->handleRequest($request);

        if ($gameForm->isValid() && $gameForm->get('propose')->isClicked()) {
            $answers = $gameForm->getData();
            $correct = $game->processUserAnswer($this->getUser(), $question, $answers);
            if (true === $correct) {
                $request->getSession()->getFlashBag()->add('success', 'Correct ! '.$question->getPoints().' points');
                $game->pickQuestion($this->getUser());
            } else {
                $request->getSession()->getFlashBag()->add('warning', 'Mauvaise réponse, réessayez ou pichez une nouvelle question');
            }
            return $this->redirect($this->generateUrl('kuizu_game_play'));
        }

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
