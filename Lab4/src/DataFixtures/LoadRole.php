<?php

namespace App\DataFixtures;
use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadRole extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
     $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $user1=new User();
        $user2=new User();
        $user1->setEmail('chapligin141299@gmail.com');
        $user1->setRoles(['ROLE_USER']);
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1, '141299'));
        $manager->persist($user1);
        $user2->setEmail('kocmonavtik1412@gmail.com');
        $user2->setRoles(['ROLE_ADMIN']);
        $user2->setPassword($this->passwordEncoder->encodePassword(
            $user2, '290677'));
        $manager->persist($user2);
        $manager->flush();
    }
}
