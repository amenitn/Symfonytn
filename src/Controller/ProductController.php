<?php

namespace App\Controller;

use SebastianBergmann\CodeCoverage\Report\Html\Renderer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="productAction")
     */
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
 /**
  * @Route("/liste/{var}", name="listeAction")
  */

    public function ListeProduits ( $var) {
        return new Response("C'est la liste des " .$var ." est :");
    }


    /**
     * @Route("/show",name="showAction")
     */
    public function ShowProduct ()
    {
        return $this->render("/product/index.html.twig");
    }
}
