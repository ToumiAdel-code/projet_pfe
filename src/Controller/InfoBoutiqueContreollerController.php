<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoBoutiqueContreollerController extends AbstractController
{
    /**
     * @Route("/info/boutique", name="info_boutique_contreoller")
     */
    public function index(): Response
    {
        return $this->render('info_boutique_contreoller/index.html.twig');
    }
}
