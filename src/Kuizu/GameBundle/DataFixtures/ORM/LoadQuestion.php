<?php

namespace Kuizu\CoreBundle\DataFixture\ORM;

use Kuizu\GameBundle\Entity\Question;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadQuestion extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $question1 = new Question();
        $question1->setWording('Quel surnom donne Ivankov à Luffy ?');
        //$question1->setAnswer('Mugiwara Boy');
        $question1->setManga($this->getReference('manga-one-piece'));
        $question1->setPoints(2);
        $question1->setAuthor($this->getReference('user-sokaru'));
        $manager->persist($question1);

        /*$question2 = new Question();
        $question2->setWording('Quel est le nom de famille de Naruto ?');
        $question2->setAnswer('Uzumaki');
        $question2->setManga($this->getReference('manga-naruto'));
        $question2->setPoints(1);
        $question2->setAuthor($this->getReference('user-soct'));
        $manager->persist($question2);

        $question3 = new Question();
        $question3->setWording('Quel est le surnom de Tsuna ?');
        $question3->setAnswer('Tsunaze');
        $question3->setManga($this->getReference('manga-kateikyoushi-hitman-reborn'));
        $question3->setPoints(1);
        $question3->setAuthor($this->getReference('user-soct'));
        $manager->persist($question3);*/

        $question4 = new Question ();
        $question4->setWording('Qui compose la famille du dixième Vongola ? (Les noms complet sont attendus.)');
        $question4->setManga($this->getReference('manga-kateikyoushi-hitman-reborn'));
        $question4->setPoints(10);
        $question4->setAuthor($this->getReference('user-soct'));
        $manager->persist($question4);

        /*$question5 = new Question ();
        $question5->setWording('Qui a créé Bleach ?');
        $question5->setNbrAnswers(1);
        $question5->setAnswer('Tite Kubo');
        $question5->setManga($this->getReference('manga-bleach'));
        $question5->setPoints(2);
        $question5->setAuthor($this->getReference('user-soct'));
        $manager->persist($question5);

        $question6 = new Question ();
        $question6->setWording('Quel est le nom du 90ème Hado ?');
        $question6->setNbrAnswers(1);
        $question6->setAnswer('Kurohitsugi');
        $question6->setManga($this->getReference('manga-bleach'));
        $question6->setPoints(8);
        $question6->setAuthor($this->getReference('user-soct'));
        $manager->persist($question6);

        $question7 = new Question ();
        $question7->setWording('Quel est le nom du dragon qui a élévé Natsu Dragnil ?');
        $question7->setNbrAnswers(1);
        $question7->setAnswer('Igneel');
        $question7->setManga($this->getReference('manga-fairy-tail'));
        $question7->setPoints(1);
        $question7->setAuthor($this->getReference('user-soct'));
        $manager->persist($question7);

        $question8 = new Question ();
        $question8->setWording('Au début de Fairy Tail qui fait la converture du Sorcerer Magazine ?');
        $question8->setNbranswers(1);
        $question8->setAnswer('Mirajane');
        $question8->setManga($this->getReference('manga-fairy-tail'));
        $question8->setPoints(2);
        $question8->setAuthor($this->getReference('user-soct'));
        $manager->persist($question8);

        $question9 = new Question ();
        $question9->setWording('Le Nen se divise en 4 catégories quelles sont-elles ?');
        $question9->setNbrAnswers(4);
        $question9->setAnswer('Ten, Zetsu, Ren, Hatsu');
        $question9->setManga($this->getReference('manga-hunter-x-hunter'));
        $question9->setPoints(3);
        $question9->setAuthor($this->getReference('user-soct'));
        $manager->persist($question9);

        $question10 = new Question ();
        $question10->setWording('Quels sont les 13 membres de la brigade fantôme ?');
        $question10->setNbrAnswers(13);
        $question10->setAnswer('Shizuku, Uvoguine, Franklin, Machi, Kurutopi, Sharnalk, Nobunaga, Pakunoda, Bonole, Feitan, Finks, Hisoka, Kuroro');
        $question10->setManga($this->getReference('manga-hunter-x-hunter'));
        $question10->setPoints(10);
        $question10->setAuthor($this->getReference('user-soct'));
        $manager->persist($question10);

        $question11 = new Question ();
        $question11->setWording('Quel est le score de Seirin contre Shutoku ?');
        $question11->setNbrAnswers(1);
        $question11->setAnswer('82');
        $question11->setManga($this->getReference('manga-kuroko-no-basket'));
        $question11->setPoints(3);
        $question11->setAuthor($this->getReference('user-soct'));
        $manager->persist($question11);

        $question12 = new Question ();
        $question12->setWording('Quel est le numéro de Hyuga ?');
        $question12->setNbrAnswers(1);
        $question12->setAnswer('4');
        $question12->setManga($this->getReference('manga-kuroko-no-basket'));
        $question12->setPoints(2);
        $question12->setAuthor($this->getReference('user-soct'));
        $manager->persist($question12);

        $question13 = new Question ();
        $question13->setWording('Quel est le vrai nom de L ?');
        $question13->setNbrAnswers(1);
        $question13->setAnswer('Lawliet');
        $question13->setManga($this->getReference('manga-death-note'));
        $question13->setPoints(2);
        $question13->setAuthor($this->getReference('user-soct'));
        $manager->persist($question13);

        $question14 = new Question ();
        $question14->setWording('Qui est la première victime de Kira ?');
        $question14->setNbrAnswers(1);
        $question14->setAnswer('Kurô Otoharada');
        $question14->setManga($this->getReference('manga-death-note'));
        $question14->setPoints(9);
        $question14->setAuthor($this->getReference('user-soct'));
        $manager->persist($question14);

        $question15 = new Question ();
        $question15->setWording('Que signifie AT ?');
        $question15->setNbrAnswers(1);
        $question15->setAnswer('Air Trecks');
        $question15->setManga($this->getReference('manga-air-gear'));
        $question15->setPoints(1);
        $question15->setAuthor($this->getReference('user-soct'));
        $manager->persist($question15);

        $question16 = new Question ();
        $question16->setWording('Quel est le vrai nom de l\'auteur de Air Gear ?');
        $question16->setNbrAnswers(1);
        $question16->setAnswer('Ogure Ito');
        $question16->setManga($this->getReference('manga-air-gear'));
        $question16->setPoints(3);
        $question16->setAuthor($this->getReference('user-soct'));
        $manager->persist($question16);

        $question17 = new Question ();
        $question17->setWording('Quel est le nom du rival des héros ?');
        $question17->setNbrAnswers(1);
        $question17->setAnswer('Nizuma Eiji');
        $question17->setManga($this->getReference('manga-bakuman'));
        $question17->setPoints(2);
        $question17->setAuthor($this->getReference('user-soct'));
        $manager->persist($question17);

        $question18 = new Question ();
        $question18->setWording('Quel est le surnom d\'auteur de notre duo ?');
        $question18->setNbrAnswers(1);
        $question18->setAnswer('Muto Ashirogi');
        $question18->setManga($this->getReference('manga-bakuman'));
        $question18->setPoints(3);
        $question18->setAuthor($this->getReference('user-soct'));
        $manager->persist($question18);

        $question19 = new Question ();
        $question19->setWording('Quel est le nom du héros ?(le nom complet est attendu)');
        $question19->setNbrAnswers(1);
        $question19->setAnswer('Oga Tatsumi');
        $question19->setManga($this->getReference('manga-beelzebub'));
        $question19->setPoints(1);
        $question19->setAuthor($this->getReference('user-soct'));
        $manager->persist($question19);

        $question20 = new Question ();
        $question20->setWording('Qui est amoureuse du héros ?');
        $question20->setNbrAnswers(1);
        $question20->setAnswer('Hildegarda');
        $question20->setManga($this->getReference('manga-beelzebub'));
        $question20->setPoints(3);
        $question20->setAuthor($this->getReference('user-soct'));
        $manager->persist($question20);

        $question21 = new Question ();
        $question21->setWording('Que signifie "Alucard" ?');
        $question21->setNbrAnswers(1);
        $question21->setAnswer('Dracula');
        $question21->setManga($this->getReference('manga-hellsing-ultimate'));
        $question21->setPoints(2);
        $question21->setAuthor($this->getReference('user-soct'));
        $manager->persist($question21);

        $question22 = new Question ();
        $question22->setWording('Quel est le nom complet de Sir Integra ?');
        $question22->setNbrAnswers(1);
        $question22->setAnswer('Sir Integra Fairbrook Wingates Hellsing');
        $question22->setManga($this->getReference('manga-hellsing-ultimate'));
        $question22->setPoints(6);
        $question22->setAuthor($this->getReference('user-soct'));
        $manager->persist($question22);

        $question23 = new Question ();
        $question23->setWording('A qui la phrase : The Bird of the Hermes is my name ; Eating my wings to make me tame, fait-elle référence ?');
        $question23->setNbrAnswers(1);
        $question23->setAnswer('Nicolas Flamel');
        $question23->setManga($this->getReference('manga-hellsing-ultimate'));
        $question23->setPoints(10);
        $question23->setAuthor($this->getReference('user-soct'));
        $manager->persist($question23);

        $question24 = new Question ();
        $question24->setWording('Qui sont les 4 empereurs ?');
        $question24->setNbrAnswers(4);
        $question24->setAnswer('Toriko, Coco, Sunny, Zebra');
        $question24->setManga($this->getReference('manga-toriko'));
        $question24->setPoints(4);
        $question24->setAuthor($this->getReference('user-soct'));
        $manager->persist($question24);

        $question25 = new Question ();
        $question25->setWording('Quel est le nom du héro ?');
        $question25->setNbrAnswers(1);
        $question25->setAnswer('Godou Kusanagi');
        $question25->setManga($this->getReference('manga-campione'));
        $question25->setPoints(1);
        $question25->setAuthor($this->getReference('user-soct'));
        $manager->persist($question25);

        $question26 = new Question ();
        $question26->setWording('Comment s\'appelle les frères Elric ?');
        $question26->setNbrAnswers(2);
        $question26->setAnswer('Edward, Alphonse');
        $question26->setManga($this->getReference('manga-fullmetal'));
        $question26->setPoints(1);
        $question26->setAuthor($this->getReference('user-soct'));
        $manager->persist($question26);

        $question27 = new Question ();
        $question27->setWording('Comment s\'appelle la petite fille qui sera fusionner avec son chien ?');
        $question27->setNbrAnswers(1);
        $question27->setAnswer('Nina');
        $question27->setManga($this->getReference('manga-fullmetal'));
        $question27->setPoints(5);
        $question27->setAuthor($this->getReference('user-soct'));
        $manager->persist($question27);

        $question28 = new Question ();
        $question28->setWording('Quel est le nom de la mère de Son Gohan ?');
        $question28->setNbrAnswers(1);
        $question28->setAnswer('Chichi');
        $question28->setManga($this->getReference('manga-dbz'));
        $question28->setPoints(3);
        $question28->setAuthor($this->getReference('user-soct'));
        $manager->persist($question28);

        $question29 = new Question ();
        $question29->setWording('Qui sont les 3 personnages principaux ?');
        $question29->setNbrAnswers(3);
        $question29->setAnswer('Mugen, Jin, Fuu');
        $question29->setManga($this->getReference('manga-samuraichamploo'));
        $question29->setPoints(4);
        $question29->setAuthor($this->getReference('user-soct'));
        $manager->persist($question29);

        $question30 = new Question ();
        $question30->setWording('Qui était le premier propriètaire du chapeau de paille ?');
        $question30->setNbrAnswers(1);
        $question30->setAnswer('Gold D.Roger');
        $question30->setManga($this->getReference('manga-one-piece'));
        $question30->setPoints(2);
        $question30->setAuthor($this->getReference('user-soct'));
        $manager->persist($question30);

        $question31 = new Question ();
        $question31->setWording('Quelle était la première prime de Luffy ? (seulement en chiffre)');
        $question31->setNbrAnswers(1);
        $question31->setAnswer('30000000');
        $question31->setManga($this->getReference('manga-one-piece'));
        $question31->setPoints(1);
        $question31->setAuthor($this->getReference('user-soct'));
        $manager->persist($question31);

        $question32 = new Question ();
        $question32->setWording('Quel est le nom du village de Nami ?');
        $question32->setNbrAnswers(1);
        $question32->setAnswer('Kokoyashi');
        $question32->setManga($this->getReference('manga-one-piece'));
        $question32->setPoints(2);
        $question32->setAuthor($this->getReference('user-soct'));
        $manager->persist($question32);

        $question33 = new Question ();
        $question33->setWording('Quel est le nom complet de Kuma ?');
        $question33->setNbrAnswers(1);
        $question33->setAnswer('Bartholomew Kuma');
        $question33->setManga($this->getReference('manga-one-piece'));
        $question33->setPoints(3);
        $question33->setAuthor($this->getReference('user-soct'));
        $manager->persist($question33);

        $question34 = new Question ();
        $question34->setWording('Quels sont les 11 supernovas ?');
        $question34->setNbrAnswers(11);
        $question34->setAnswer('Monkey D.Luffy, Trafalgar Law, Eustass Kidd, X. Drake, Jewelry Bonney, Scratchmen Apoo, Capone Bege, Basil Hawkins, Zorro Roronoa, Killer, Urouge');
        $question34->setManga($this->getReference('manga-one-piece'));
        $question34->setPoints(10);
        $question34->setAuthor($this->getReference('user-soct'));
        $manager->persist($question34);

        $question35 = new Question ();
        $question35->setWording('Quel est le nom du dernier katana que Zoro obtien ?');
        $question35->setNbrAnswers(1);
        $question35->setAnswer('Shuusui');
        $question35->setManga($this->getReference('manga-one-piece'));
        $question35->setPoints(4);
        $question35->setAuthor($this->getReference('user-soct'));
        $manager->persist($question35);

        $question36 = new Question ();
        $question36->setWording('Qui a mangé le Tori Tori No Mi ?');
        $question36->setNbrAnswers(1);
        $question36->setAnswer('Pell');
        $question36->setManga($this->getReference('manga-one-piece'));
        $question36->setPoints(5);
        $question36->setAuthor($this->getReference('user-soct'));
        $manager->persist($question36);

        $question37 = new Question ();
        $question37->setWording('Quel est le vrai nom de Kuybi ?');
        $question37->setNbrAnswers(1);
        $question37->setAnswer('Kurama');
        $question37->setManga($this->getReference('manga-naruto'));
        $question37->setPoints(4);
        $question37->setAuthor($this->getReference('user-soct'));
        $manager->persist($question37);

        $question38 = new Question ();
        $question38->setWording('Comment appelle-t-on la version évoluée du sharingan ?');
        $question38->setNbrAnswers(1);
        $question38->setAnswer('Mangekyo Sharingan');
        $question38->setManga($this->getReference('manga-naruto'));
        $question38->setPoints(3);
        $question38->setAuthor($this->getReference('user-soct'));
        $manager->persist($question38);

        $question39 = new Question ();
        $question39->setWording('Qui est le père de Naruto ?');
        $question39->setNbrAnswers(1);
        $question39->setAnswer('Minato Namikaze');
        $question39->setManga($this->getReference('manga-naruto'));
        $question39->setPoints(2);
        $question39->setAuthor($this->getReference('user-soct'));
        $manager->persist($question39);

        $question40 = new Question ();
        $question40->setWording('De quel religion sont inspirées les techniques du sharingan ?');
        $question40->setNbrAnswers(1);
        $question40->setAnswer('Shintoïsme');
        $question40->setManga($this->getReference('manga-naruto'));
        $question40->setPoints(9);
        $question40->setAuthor($this->getReference('user-soct'));
        $manager->persist($question40);

        $question41 = new Question ();
        $question41->setWording('Qui est l\'auteur de Naruto ?');
        $question41->setNbrAnswers(1);
        $question41->setAnswer('Masashi Kishimoto');
        $question41->setManga($this->getReference('manga-naruto'));
        $question41->setPoints(3);
        $question41->setAuthor($this->getReference('user-soct'));
        $manager->persist($question41);

        $question42 = new Question ();
        $question42->setWording('Combien d\'hokage à connu Konoha ? (répondre en chiffre)');
        $question42->setNbrAnswers(1);
        $question42->setAnswer('5');
        $question42->setManga($this->getReference('manga-naruto'));
        $question42->setPoints(2);
        $question42->setAuthor($this->getReference('user-soct'));
        $manager->persist($question42);

        $question43 = new Question ();
        $question43->setWording('Quel est le nom des yeux du clan Hyuuga ?');
        $question43->setNbrAnswers(1);
        $question43->setAnswer('Byakugan');
        $question43->setManga($this->getReference('manga-naruto'));
        $question43->setPoints(2);
        $question43->setAuthor($this->getReference('user-soct'));
        $manager->persist($question43);

        $question44 = new Question ();
        $question44->setWording('Quel est le nom du clan qui se sert d\'insectes comme arme ?');
        $question44->setNbrAnswers(1);
        $question44->setAnswer('Aburame');
        $question44->setManga($this->getReference('manga-naruto'));
        $question44->setPoints(3);
        $question44->setAuthor($this->getReference('user-soct'));
        $manager->persist($question44);

        $question45 = new Question ();
        $question45->setWording('Quel est  le type d\'animaux invoqués par le kuchiyose no jutsu de Jiraya ?');
        $question45->setNbrAnswers(1);
        $question45->setAnswer('Crapaud');
        $question45->setManga($this->getReference('manga-naruto'));
        $question45->setPoints(1);
        $question45->setAuthor($this->getReference('user-soct'));
        $manager->persist($question45);

        $question46 = new Question ();
        $question46->setWording('Comment appelle-t-on les âmes artificielles ? (exemple Kon)');
        $question46->setNbrAnswers(1);
        $question46->setAnswer('Mod Soul');
        $question46->setManga($this->getReference('manga-bleach'));
        $question46->setPoints(2);
        $question46->setAuthor($this->getReference('user-soct'));
        $manager->persist($question46);

        $question47 = new Question ();
        $question47->setWording('De quelle couleur sont les liens spirituels d\'un shinigami ?');
        $question47->setNbrAnswers(1);
        $question47->setAnswer('Rouge');
        $question47->setManga($this->getReference('manga-bleach'));
        $question47->setPoints(2);
        $question47->setAuthor($this->getReference('user-soct'));
        $manager->persist($question47);

        $question48 = new Question ();
        $question48->setWording('Quel est le nom du zanpakuto de Kisuké ?');
        $question48->setNbrAnswers(1);
        $question48->setAnswer('Benihime');
        $question48->setManga($this->getReference('manga-bleach'));
        $question48->setPoints(4);
        $question48->setAuthor($this->getReference('user-soct'));
        $manager->persist($question48);

        $question49 = new Question ();
        $question49->setWording('Quel est le nom de famille de Rukia ?');
        $question49->setNbrAnswers(1);
        $question49->setAnswer('Kuchiki');
        $question49->setManga($this->getReference('manga-bleach'));
        $question49->setPoints(1);
        $question49->setAuthor($this->getReference('user-soct'));
        $manager->persist($question49);

        $question50 = new Question ();
        $question50->setWording('Quel est le nom du Getsuga Tenshô Ultime ?');
        $question50->setNbrAnswers(1);
        $question50->setAnswer('Mugetsu');
        $question50->setManga($this->getReference('manga-bleach'));
        $question50->setPoints(3);
        $question50->setAuthor($this->getReference('user-soct'));
        $manager->persist($question50);

        $question51 = new Question ();
        $question51->setWording('Contre quel gardien se bat Ichigo lors de son arrivé à la Soul Society ?');
        $question51->setNbrAnswers(1);
        $question51->setAnswer('Jidanbou');
        $question51->setManga($this->getReference('manga-bleach'));
        $question51->setPoints(4);
        $question51->setAuthor($this->getReference('user-soct'));
        $manager->persist($question51);
        */

        $manager->flush();

        $this->addReference('one-piece-q1', $question1);
        /*$this->addReference('naruto-q1', $question2);
        $this->addReference('kateikyoushi-hitman-reborn-q1', $question3);*/
        $this->addReference('kateikyoushi-hitman-reborn-q2', $question4);
        /*$this->addReference('bleach-q1', $question5);
        $this->addReference('bleach-q2', $question6);
        $this->addReference('fairy-tail-q1', $question7);
        $this->addReference('fairy-tail-q2', $question8);
        $this->addReference('hunter-x-hunter-q1', $question9);
        $this->addReference('hunter-x-hunter-q2', $question10);*/
    }

    public function getOrder()
    {
        return 150;
    }
}