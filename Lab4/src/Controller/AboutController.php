<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class AboutController extends AbstractController
{
    /**
     * @Route("/", name="about")
     *
     */
    public function index(): Response
    {
        return new RedirectResponse($this->generateUrl('article_index'));
    }
}
