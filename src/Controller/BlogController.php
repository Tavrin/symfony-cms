<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
    $articles = $em->getRepository(Article::class)->findAll();

    return $this -> render('blog/index.html.twig', ['articles' => $articles]);
    }

      /**
     * @Route("/blog/{id}", name="view_article")
     */
    public function view(string $id)
    {
        $article = $this->getDoctrine()
        ->getRepository(Article::class)
        ->find($id);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article found for id '.$id
            );
        }
    
        return new Response('Check out this great article: '.$article->getName());
    }
}
