<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article")
     */
    public function index()
    {
        $repository = $this->getDoctrine() -> getRepository(Article::class);
        $articles = $repository->findAll();

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/add-form", name="add_form_article")
     * @Route("/update/{article}", name="update_article")
     */
    public function addCar(Request $request, Article $article = null)
    {
        if (!$article) {
            $article = new Article();
        }
        $form = $this->createForm(ArticleType::class, new Article());
        // Ici nous traitons notre requête
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();


            return $this->redirectToRoute('article');
        } else {
            return $this->render('article/add_form_article.html.twig', [
                'form' => $form->createView(),
                'errors' => $form->getErrors()
            ]);
        }
    }

    /**
     * @Route("/detail/{article}", name="article_detail")
     */
    public function detail(Article $article)
    {
        return $this->render('article/article_detail.html.twig',[
                'article' => $article
            ]
        );

    }

    /**
     * @Route("/{article}/delete", name="delete_article")
     */
    public function delete(Article $article)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        return $this->redirectToRoute('article');
    }

}
