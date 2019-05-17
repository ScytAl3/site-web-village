<?php

namespace App\Controller\Admin;

use App\Entity\Picture;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/admin/picture")
 */
class AdminPictureController extends AbstractController
{
    /**
     * @Route("/admin/event/{id}", name="admin.picture.delete", methods="DELETE")
     * @param Picture $picture
     * @param Request $request
     */
    public function delete(Picture $picture, Request $request)
    {
        // On sauvegarde les donnees de l evenement associe a l image avant de la supprimer
        $data = \json_decode($request->getContent(), true);
        // On verifie si  le token associe au bouton Delete est valide
        if ($this->isCsrfTokenValid('delete' . $picture->getIdPicture(), $data['_token'])) {
            // On prepare la  suppression de l entite Event selectionne
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($picture);
            // On execute la requete de suppression - transaction
            $entityManager->flush();
            return new JsonResponse(['success' => 1]);
        }
        return new JsonResponse(['error' => 'invalid token'], 400);
    }
}
