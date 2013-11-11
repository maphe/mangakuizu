<?php

namespace Kuizu\CoreBundle\DataFixtures\ORM;

use Kuizu\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $sokaru = new User();
        $sokaru->setUsername('Sokaru');
        $sokaru->setEmail('sokaru91@gmail.com');
        $sokaru->setPassword('');
        $sokaru->setScore(0);
        $sokaru->setRoles(array('ROLE_SUPER_ADMIN'));
        $manager->persist($sokaru);

        $soct = new User();
        $soct->setUsername('Soct');
        $soct->setEmail('soct@test.com');
        $soct->setPassword('');
        $soct->setScore(0);
        $soct->setRoles(array('ROLE_CONTRIB'));
        $manager->persist($soct);

        $luluche = new User();
        $luluche->setUsername('Luluche');
        $luluche->setEmail('luluche@test.com');
        $luluche->setPassword('');
        $luluche->setScore(0);
        $manager->persist($luluche);

        $limeas = new User();
        $limeas->setUsername('Limeas');
        $limeas->setEmail('limeas@test.com');
        $limeas->setPassword('');
        $limeas->setScore(0);
        $manager->persist($limeas);

        $katsu = new User();
        $katsu->setUsername('Katsu');
        $katsu->setEmail('katsu@test.com');
        $katsu->setPassword('');
        $katsu->setScore(0);
        $manager->persist($katsu);

        $juju = new User();
        $juju->setUsername('Juju');
        $juju->setEmail('juju@test.com');
        $juju->setPassword('');
        $juju->setScore(0);
        $manager->persist($juju);

        for ($i = 1; $i < 500; $i++) {
            $var = 'user'.$i;
            $$var = new User();
            $$var->setUsername('Random'.$i);
            $$var->setEmail('random'.$i.'@test.com');
            $$var->setPassword('');
            $$var->setScore(rand(0, 10000));
            $manager->persist($$var);
        }

        $manager->flush();

        for ($i = 1; $i < 500; $i++) {
            $var = 'user'.$i;
            $$var->setScore(rand(0, 10000));
            $manager->persist($$var);
        }

        $manager->flush();

        $this->addReference('user-sokaru', $sokaru);
        $this->addReference('user-soct', $soct);
        $this->addReference('user-luluche', $luluche);
        $this->addReference('user-limeas', $limeas);
        $this->addReference('user-katsu', $katsu);
        $this->addReference('user-juju', $juju);

        $manipulator = $this->container->get('fos_user.util.user_manipulator');

        $manipulator->changePassword('Sokaru', 'test');
        $manipulator->activate('Sokaru');

        $manipulator->changePassword('Soct', 'pikachu');
        $manipulator->activate('Soct');

        $manipulator->changePassword('Luluche', 'letsgoparty');
        $manipulator->activate('Luluche');

        $manipulator->changePassword('Limeas', 'colombien');
        $manipulator->activate('Limeas');

        $manipulator->changePassword('Katsu', 'kaben');
        $manipulator->activate('Katsu');

        $manipulator->changePassword('Juju', 'iloveace');
        $manipulator->activate('Juju');
    }

    public function getOrder()
    {
        return 1;
    }
}