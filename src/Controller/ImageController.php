<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Image;

class ImageController extends AbstractController
{
    /**
     * Show an image.
     * 
     * @param int $id Image identification 
     * 
     * @return Response 
     */
    public function index(int $id): Response
    {
       // Symfony Entity Manager
       $em = $this ->getDoctrine()->getManager();
        
       $image = $em->getRepository(Image::class)->findBy(['id' => $id]);

      return $this->render('image/index.html.twig', [
          'image' => $image,
      ]);
    }

    /**
     * Add an image.
     * 
     * @return Response
     */
    public function add(Request $request): Response
    {
        /**
         * Symfony Entity Manager. Use it if you need to make edition possible.
         * It wil allow you to find an image by this id befor editing.
         * $em = $this ->getDoctrine()->getManager();
         */
       //$mode = 'new';
       $image = new Image();

       $form = $this->createForm(ImageType::class, $image);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
           $this->saveImage($image);
       }

       $parameters = array(
           'form' => $form,
           'image' => $image,
           //'mode' => $mode,
       );

       return $this->render('image/add.html.twig', $parameters);
    }

    /**
     * Save image
     * 
     * @param Image $image
     */
    private function saveImage(Image $image){

        $em = $this->getDoctrine()->getManager();
        $em->persist($image);
        $em->flush();
    }

    /**
     * Delete an image
     * 
     * @param int $id Image identification
     */
    public function remove(int $id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $image = $em->getRepository(Image::class)->findBy(['id' => $id])[0];

        $em->remove($image);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }
}
