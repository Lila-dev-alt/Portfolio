<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

     public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {

        $elisa = new User();
        $elisa->setEmail('zaza3355@hotmail.fr');
        $elisa->setRoles(['ROLE_ADMIN']);
        $elisa->setPassword($this->passwordEncoder->encodePassword(
            $elisa,
            'elisa'
        ));

        $manager->persist($elisa);

        $manager->flush();
    }
}
