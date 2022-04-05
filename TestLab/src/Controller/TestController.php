<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="startpage")
     *@param BookRepository $bookRep
     *@param Request $request
     *
     * @return Response
     */
    public function index(BookRepository $bookRep,Request $request): Response
    {
        $books = $bookRep->findBy(
            [],
            ['dateRead' => 'DESC']
        );
        $user = '';
        if ($this->getUser() !== null) {
            $user = $this->getUser()->getUsername();
        }
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'books' => $books,
            'user' => $user,
        ]);
    }






    ///homepage/{name} name="homepage"
    //$greet='';
    //if($name){
    //   $greet=sprintf('<h1>Hello %s!</h1>', htmlspecialchars($name));
    //}
    //return $this->render('about/index.html.twig', [
    //     'controller_name' => 'AboutController',
    // ]);
    /*return new Response(<<<EOF
<html>
<body>
    <img src="/images/under-construction.gif" />
</body>
</html>
EOF
    );*/
}
