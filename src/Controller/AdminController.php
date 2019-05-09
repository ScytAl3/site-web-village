<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Evenement;
use App\Repository\EvenementRepository;
use App\Form\EvenementType;
use Symfony\Component\HttpFoundation\Request;



class AdminController extends AbstractController
{

    private $entityManager;
    private $evenementRepository;

    public function __construct(ObjectManager $entityManager, EvenementRepository $evenementRepository)
    {
        $this->evenementRepository = $evenementRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/admin", name="admin.evenement.index")
     */
    public function index()
    {
        $listEvent = $this->evenementRepository->findAll();
        return $this->render('admin/evenement/index.html.twig', [
            'properties' => $listEvent
        ]);
    }

    /**
     * @Route("/admin/create", name="admin.evenement.create")
     */
    public function create(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($evenement);
            $this->entityManager->flush();
            $this->addFlash('success', 'L\'événement à été créé avec succès');
            return $this->redirectToRoute('admin.evenement.index');
        }
        return $this->render('admin/evenement/create.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
