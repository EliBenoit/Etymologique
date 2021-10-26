<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Definition;
use App\Entity\Image;
use App\Entity\Name;

class HomeController extends AbstractController
{
    /**
     * Home page
     * 
     * @return Response
     */
    public function index(): Response
    {
        // Symfony Entity Manager
        $em = $this ->getDoctrine()->getManager();

        // Get all simple data from back
        $definitions = $em->getRepository(Definition::class)->findAll();
        $images = $em->getRepository(Image::class)->findAll();
        $names = $em->getRepository(Name::class)->findAll();

        return $this->render('home/index.html.twig', [
            'definitions' => $definitions,
            'images' => $images,
            'names' => $names,
        ]);
    }
}
