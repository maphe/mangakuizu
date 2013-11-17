<?php

namespace Kuizu\GameBundle\Controller;

use Kuizu\GameBundle\Entity\Answer;
use Kuizu\GameBundle\Entity\Question;
use Kuizu\GameBundle\Form\Type\QuestionType;
use Kuizu\GameBundle\Form\Type\UserAnswerType;
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

        $gameForm = $this->createForm(new UserAnswerType(), null, ['question' => $question]);
        $gameForm->handleRequest($request);

        if ($gameForm->isValid() && $gameForm->get('propose')->isClicked()) {
            $answers = $gameForm->getData();
            $correct = $game->processUserAnswer($this->getUser(), $question, $answers);
            if (true === $correct) {
                $request->getSession()->getFlashBag()->add('success',
                    'Correct ! '.$question->getPoints().' points');
                $game->pickQuestion($this->getUser());
            } else {
                $request->getSession()->getFlashBag()->add('warning',
                    'Mauvaise réponse, réessayez ou pichez une nouvelle question');
            }
            return $this->redirect($this->generateUrl('kuizu_game_play'));
        }

        return $this->render('KuizuGameBundle:Game:play.html.twig', [
            'choice_form' => $mangaChoiceForm->createView(),
            'game_form'   => $gameForm->createView(),
            'question'    => $question
        ]);
    }

    public function askAction(Request $request)
    {
        $question = new Question();
        $question->addAnswer(new Answer());
        $form = $this->createForm(new QuestionType(), $question);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $question->setAuthor($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($question);
            $em->flush($question);

            $request->getSession()->getFlashBag()->add('success',
                'Votre question a bien été ajoutée');

            return $this->redirect($this->generateUrl('kuizu_game_ask'));
        }

        return $this->render('KuizuGameBundle:Game:ask.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
