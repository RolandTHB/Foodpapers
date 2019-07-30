<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        $repository = $this->getDoctrine() -> getRepository(Article::class);
        $articles = $repository->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'articles' => $articles
        ]);
    }
}
