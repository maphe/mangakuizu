<?php

namespace Kuizu\CoreBundle\DataFixture\ORM;

use Kuizu\GameBundle\Entity\Answer;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadAnswer extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /*$question1 = $this->getReference('one-piece-q1');

        $answer1 = new Answer();
        $answer1->setWording('Mugiwara Boy');
        $answer1->setQuestion($question1);
        $manager->persist($answer1);

        $question4 = $this->getReference('kateikyoushi-hitman-reborn-q2');

        $answer1q4 = new Answer();
        $answer1q4->setWording('Tsunayoshi Sawada');
        $answer1q4->setQuestion($question4);
        $manager->persist($answer1q4);

        $answer2q4 = new Answer();
        $answer2q4->setWording('Gokudera Hayato');
        $answer2q4->setQuestion($question4);
        $manager->persist($answer2q4);

        $answer3q4 = new Answer();
        $answer3q4->setWording('Yamamoto Takeshi');
        $answer3q4->setQuestion($question4);
        $manager->persist($answer3q4);

        $answer4q4 = new Answer();
        $answer4q4->setWording('Ryohei Sasagawa');
        $answer4q4->setQuestion($question4);
        $manager->persist($answer4q4);

        $answer5q4 = new Answer();
        $answer5q4->setWording('Hibari Kyoya');
        $answer5q4->setQuestion($question4);
        $manager->persist($answer5q4);

        $answer6q4 = new Answer();
        $answer6q4->setWording('Lambo');
        $answer6q4->setQuestion($question4);
        $manager->persist($answer6q4);

        $answer7q4 = new Answer();
        $answer7q4->setWording('Chrome Dokuro');
        $answer7q4->setQuestion($question4);
        $manager->persist($answer7q4);

        $manager->flush();

        $this->addReference('one-piece-q1-a1', $answer1);*/
    }

    public function getOrder()
    {
        return 200;
    }
}