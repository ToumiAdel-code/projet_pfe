<?php

namespace App\Controller\Admin;

use App\Entity\Carrier;
use App\Entity\Category;
use App\Entity\Contact;
use App\Entity\Header;
use App\Entity\Order;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BICC');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Utilisateur', 'fa fa-user', \App\Entity\User::class);
        yield MenuItem::linkToCrud('Commande', 'fa fa-shopping-cart', Order::class);
        yield MenuItem::linkToCrud('Catégorie', 'fa fa-list', Category::class);
        yield MenuItem::linkToCrud('Produit', 'fa fa-tag', Product::class);
        yield MenuItem::linkToCrud('Transporteur', 'fa fa-truck', Carrier::class);
        yield MenuItem::linkToCrud('NavBar', 'fa fa-desktop', Header::class);
        yield MenuItem::linkToCrud('Contacter', 'fa fa-id-badge', Contact::class);
    }
}
