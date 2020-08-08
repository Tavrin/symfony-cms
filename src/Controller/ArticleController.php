<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }

    /**
     * @Route("/article/new", name="new article")
     */
    public function new()
    {
        $entityManager = $this->getDoctrine()->getManager();


       $user = $entityManager->getRepository(User::class)->findBy(['id' => 2]);
        dump($user[0]);
        $article = new Article();
        $article->setAuthor($user[0]);
        $article->setName('Article 1');
        $article->SetDate(new \DateTime());
        $article->setText('test texte');

        $entityManager->persist($article);
        

        $entityManager->flush();
        return new Response('Saved new article with id '.$article->getId());
    }
}

