<?php

namespace App\DataFixtures;
use App\Entity\Article;
use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        

        
    }
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
