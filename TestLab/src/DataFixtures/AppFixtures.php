<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        /*$addUser=new User();
        $addUser->setName('Kocmo');
        $addUser->setEmail('myemail@gmail.com');
        $addUser->setPass('12345');*/
        $user1=new User();
        $user1->setEmail('chapligin141299@gmail.com');
        $user1->setRoles(['ROLE_USER']);
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1, '141299'));


        $addBook1=new Book();
        $addBook1->setName('Lab1');
        $addBook1->setAuthor('Chaplygin');
        $addBook1->setImage('ImageBook1.png');
        $addBook1->setBookFile('Lab1.pdf');
        $addBook1->setDateRead(\DateTime::createFromFormat('H:i:s Y-m-d',date('H:i:s Y-m-d', strtotime("-1 hours 30 minutes"))));

        //$addBook1->setDateRead(\DateTime::createFromFormat(date('H:i:s Y-m-d', strtotime("-1 hours 30 minutes"))));

        $addBook2=new Book();
        $addBook2->setName('Lab5');
        $addBook2->setAuthor('Chaplygin');
        $addBook2->setImage('ImageBook5.png');
        $addBook2->setBookFile('Lab5.pdf');
        $addBook2->setDateRead(\DateTime::createFromFormat('H:i:s Y-m-d',date('H:i:s Y-m-d')));



        $manager->persist($addBook1);
        $manager->persist($addBook2);
        $manager->persist($user1);
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
