<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Definition;

class DefinitionController extends AbstractController
{
    /**
     * Show a description.
     * 
     * @param int $id Description identification 
     * 
     * @return Response 
     */
    public function index(int $id): Response
    {
         // Symfony Entity Manager
         $em = $this ->getDoctrine()->getManager();

         $definition = $em->getRepository(Definition::class)->findBy(['id' => $id]);

        return $this->render('definition/index.html.twig', [
            'definition' => $definition,
        ]);
    }


}
