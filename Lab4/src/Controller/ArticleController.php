<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Review;
use App\Form\ArticleType;
use App\Form\ReviewType;
use App\Repository\ArticleRepository;
use App\Repository\ReviewRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET","POST"})
     * @param ArticleRepository $articleRepository
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(ArticleRepository $articleRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $articles=$articleRepository->findBy(
            [],
            ['date'=>'DESC']
        );

        $pagination=$paginator->paginate(
            $articles,
            $request->query->getInt('page',1),
            3
        );

        $user = '';
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUsername();
        }

        return $this->render('article/index.html.twig', [
            'controller_name' => 'AboutController',
            'articles'=>$pagination,
            'user'=>$user,
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", methods={"GET","POST"})
     */
    public function show(Article $article, ReviewRepository $reviewRepository, Request $request): Response
    {
        $article->setCountVisit($article->getCountVisit()+1);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($article);
        $entityManager->flush();

        $reviewNew = new Review();
        $form = $this->createForm(ReviewType::class, $reviewNew);
        $form->handleRequest($request);

        $article->setCountReview($article->getReviews()->count());
        $user = '';
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUsername();
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $reviewNew->setEmailUser($this->getUser());
            $reviewNew->setNameArticle($article);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reviewNew);
            $article->setCountReview($article->getReviews()->count()+1);
            $entityManager->persist($article);
            $entityManager->flush();
            $this->redirectToRoute('article_show', array('id'=>$article->getId()));
            //$this->redirect('/article/'.$article->getId());
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'user'=>$user,
            'reviews'=>$article->getReviews(),
            'reviewNew'=>$reviewNew,
            'form'=>$form->createView(),
        ]);
    }

}
