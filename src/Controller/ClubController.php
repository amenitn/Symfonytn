<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("/club", name="clubAction")
     */
    public function index(): Response
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }

    //attention on met pas $nom dans le path
    
/**
 * @param $nom
 * @Route("/affiche/{nom}", name="afficheAction") 
 */
    public function getName($nom) : Response {
        return $this->render('club/index.html.twig',['n'=>$nom]);
    }
}
