<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Name;

class NameController extends AbstractController
{
    /**
     * Show a name.
     * 
     * @param int $id Name identification 
     * 
     * @return Response 
     */
    public function index(int $id): Response
    { 
        // Symfony Entity Manager
        $em = $this ->getDoctrine()->getManager();
        
        $name = $em->getRepository(Name::class)->findBy(['id' => $id]);

       return $this->render('name/index.html.twig', [
           'name' => $name,
       ]);
    }
}
