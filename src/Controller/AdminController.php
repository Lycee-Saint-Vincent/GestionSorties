<?php

namespace App\Controller;

use App\Form\FilterOrSearch\FilterIndexSortieType;
use App\Repository\ProjetRepository;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(Request $request, ProjetRepository $projetRepository)
    {
        $sorties = $projetRepository->findBySorties();
        $form = $this->createForm(FilterIndexSortieType::class, null, ['method' => 'GET']);
        $filter = $form->handleRequest($request);

        return $this->render('admin/index.html.twig', [
            'sorties' => $sorties,
            'form' => $form->createView()]);
    }
}