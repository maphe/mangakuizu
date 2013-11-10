<?php

namespace Kuizu\GameBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Kuizu\GameBundle\Entity\Manga;

class LoadManga extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $onepiece = new Manga();
        $onepiece->setName('One Piece');
        $manager->persist($onepiece);

        $naruto = new Manga();
        $naruto->setName('Naruto');
        $manager->persist($naruto);

        $kateikyoushihitmanreborn = new Manga();
        $kateikyoushihitmanreborn->setName('Kateikyoushi Hitman Reborn');
        $manager->persist($kateikyoushihitmanreborn);

        $bleach = new Manga();
        $bleach->setName('Bleach');
        $manager->persist($bleach);

        $fairytail = new Manga();
        $fairytail->setName('Fairy Tail');
        $manager->persist($fairytail);

        $hunterxhunter = new Manga();
        $hunterxhunter->setName('Hunter X Hunter');
        $manager->persist($hunterxhunter);

        $kurokonobasket = new Manga();
        $kurokonobasket->setName('Kuroko no Basket');
        $manager->persist($kurokonobasket);

        $deathnote = new Manga();
        $deathnote->setName('Death Note');
        $manager->persist($deathnote);

        $airgear = new Manga();
        $airgear->setName('Air Gear');
        $manager->persist($airgear);

        $bakuman = new Manga();
        $bakuman->setName('Bakuman');
        $manager->persist($bakuman);

        $beelzebub = new Manga();
        $beelzebub->setName('Beelzebub');
        $manager->persist($beelzebub);

        $hellsingultimate = new Manga();
        $hellsingultimate->setName('Hellsing Ultimate');
        $manager->persist($hellsingultimate);

        $toriko = new Manga();
        $toriko->setName('Toriko');
        $manager->persist($toriko);

        $campione = new Manga();
        $campione->setName('Campione');
        $manager->persist($campione);

        $cowboybebop = new Manga();
        $cowboybebop->setName('Cowboy Bebop');
        $manager->persist($cowboybebop);

        $fullmetal = new Manga();
        $fullmetal->setName('Full Metal Alchemist');
        $manager->persist($fullmetal);

        $dbz = new Manga();
        $dbz->setName('Dragon Ball Z');
        $manager->persist($dbz);

        $samuraichamploo = new Manga();
        $samuraichamploo->setName('Samurai Champloo');
        $manager->persist($samuraichamploo);

        $visionescaflown = new Manga();
        $visionescaflown->setName('Vision d\'Escaflown');
        $manager->persist($visionescaflown);

        $manager->flush();

        $this->addReference('manga-one-piece',                  $onepiece);
        $this->addReference('manga-naruto',                     $naruto);
        $this->addReference('manga-kateikyoushi-hitman-reborn', $kateikyoushihitmanreborn);
        $this->addReference('manga-bleach',                     $bleach);
        $this->addReference('manga-fairy-tail',                 $fairytail);
        $this->addReference('manga-hunter-x-hunter',            $hunterxhunter);
        $this->addReference('manga-kuroko-no-basket',           $kurokonobasket);
        $this->addReference('manga-death-note',                 $deathnote);
        $this->addReference('manga-air-gear',                   $airgear);
        $this->addReference('manga-bakuman',                    $bakuman);
        $this->addReference('manga-beelzebub',                  $beelzebub);
        $this->addReference('manga-hellsing-ultimate',          $hellsingultimate);
        $this->addReference('manga-toriko',                     $toriko);
        $this->addReference('manga-campione',                   $campione);
        $this->addReference('manga-cowboybebop',                $cowboybebop);
        $this->addReference('manga-fullmetal',                  $fullmetal);
        $this->addReference('manga-dbz',                        $dbz);
        $this->addReference('manga-samuraichamploo',            $samuraichamploo);
        $this->addReference('manga-visionescaflown',            $visionescaflown);
    }

    public function getOrder()
    {
        return 50;
    }
}