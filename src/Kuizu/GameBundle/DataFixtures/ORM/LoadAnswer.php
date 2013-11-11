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
        $question1 = $this->getReference('one-piece-q1');

        $answer1 = new Answer();
        $answer1->setWording('Mugiwara Boy');
        $answer1->setQuestion($question1);
        $question1->addAnswer($answer1);

        $manager->persist($question1);
        $manager->persist($answer1);
        $manager->flush();

        $this->addReference('one-piece-q1-a1', $answer1);
    }

    public function getOrder()
    {
        return 200;
    }
}