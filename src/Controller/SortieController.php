<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\SortieType;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    #[Route('/ajoutSortie', name: 'ajout_sortie')]
    public function new(Request $request, ProjetRepository $projetRepository): Response
    {
        $projet = new Projet();

        $form = $this->createForm(SortieType::class, $projet);

        $form->handleRequest($request);

        return $this->render('sortie/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}