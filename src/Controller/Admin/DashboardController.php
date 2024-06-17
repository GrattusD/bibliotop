<?php

namespace App\Controller\Admin;

use App\Entity\Etat;
use App\Entity\Livre;
use App\Entity\Auteur;
use App\Entity\Editeur;
use App\Entity\Emprunt;
use App\Entity\Adherent;
use App\Entity\Stockage;
use App\Entity\Exemplaire;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
    
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Bibliotop');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Auteur', 'fas fa-list', Auteur::class);
        yield MenuItem::linkToCrud('Editeur', 'fas fa-list', Editeur::class);
        yield MenuItem::linkToCrud('Livre', 'fas fa-list', livre::class);
        yield MenuItem::linkToCrud('Etat', 'fas fa-list', Etat::class);
        yield MenuItem::linkToCrud('Stockage', 'fas fa-list', Stockage::class);
        yield MenuItem::linkToCrud('Adherent', 'fas fa-list', Adherent::class);
        yield MenuItem::linkToCrud('Exemplaire', 'fas fa-list', Exemplaire::class);
        yield MenuItem::linkToCrud('Emprunt', 'fas fa-list', Emprunt::class);
    }
}
