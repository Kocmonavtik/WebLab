<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use app\Entity\Article;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $manager->flush();
    }
}
