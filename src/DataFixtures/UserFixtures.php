<?php

namespace App\DataFixtures;
use App\Entity\Article;
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

for ($i = 0; $i < 10; $i++){


        $user = new User();
        $user ->setEmail("test$i@test.com");
        $user ->setUsername("test name$i");


        $user->setPassword($this->passwordEncoder->encodePassword(
                       $user,
                     'test'
                     ));
        $user ->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();
    }
        $users = $manager->getRepository(User::class)->findAll();

        foreach($users as $user){
            for ($i = 0; $i < 5; $i++){
            $article = new Article();
            $article->setName("article$i");
            $article->SetDate(new \DateTime());
            $article->setText("random text");
            $article->setAuthor($user);
    
            $manager->persist($article);
            $manager->flush();
            }
        }
        

    }
}
