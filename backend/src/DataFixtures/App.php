<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class App extends Fixture
{
    /**
    * @var UserPasswordEncoderInterface
    */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUser($manager);
        $this->loadCities($manager);
    }

    private function loadUser(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('email@example.com');
        $user->setPassword($this->passwordEncoder->encodePassword(
          $user, '12341234'
        ));

        $this->addReference('email_example', $user);

        $manager->persist($user);
        $manager->flush();
    }

    private function loadCities(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++) {
          $city = new City();
          $city->setName('City '.$i);
          $city->setOpenweatherId('OID'.$i);
          $city->setUser($this->getReference('email_example'));

          $manager->persist($city);
        }

        $manager->flush();
    }
}
