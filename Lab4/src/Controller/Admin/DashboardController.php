<?php

namespace App\Controller\Admin;

//use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\Review;
/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/admin")
 *
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/", name="adminMenu" , methods={"GET","POST"})
     */
    public function index(): Response
    {
        // redirect to some CRUD controller

        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());


        // you can also redirect to different pages depending on the current user
        /*if ('jane' === $this->getUser()->getUsername()) {
            return $this->redirect('...');
        }*/

        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Lab4');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToUrl('HomePage', 'fa fa-home',"/"),
            MenuItem::section(),
            //MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user-circle', User::class),


            //MenuItem::section('Articles'),
            MenuItem::linkToCrud('Articles', 'fa fa-file-text', Article::class),
            MenuItem::linkToCrud('Comments', 'fa fa-comment', Review::class),
            /*MenuItem::linkToCrud('Add Article', 'fa fa-file-text', Article::class)
                ->setAction('new'),
            MenuItem::linkToCrud('Show Main Article', 'fa fa-file-text', Article::class)
                ->setAction('detail')
                ->setEntityId(19),
            MenuItem::linkToCrud('Articles', 'fa fa-tags', Article::class)
                ->setController(ArticleCrudController::class),
            MenuItem::linkToCrud('Articles', 'fa fa-tags', Article::class)
                ->setDefaultSort(['createdAt' => 'DESC']),
            //MenuItem::linkToCrud('Comments', 'fa fa-comment', Review::class),*/

        ];
        ////yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
