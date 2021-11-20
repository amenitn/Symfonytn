<?php

namespace App\Controller;

use App\Entity\Classroom;
use App\Form\ClassroomType;
use App\Repository\ClassroomRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class ClassroomController extends AbstractController
{
    /**
     * @Route("/classroom", name="classroom")
     */
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }



    /**
     * @param ClassroomRepository $repo
     * @Route("/AfficheClassroom",name="AfficheClassroomAction")
     */

    public function Show( ClassroomRepository $repo) : Response {
        //$repo=$this->getDoctrine()->getRepository(Classroom::class);
        $classroom=$repo->findAll();
        return $this->render('classroom/index.html.twig',['classroom' => $classroom]);

    
    }

/**
 * @param $identifiant
 * @Route("/delete/{identifiant}",name="del")
 */
     public function Delete(ClassroomRepository $repo,$identifiant) {

         $classroom=$repo->find($identifiant);
         $em=$this->getDoctrine()->getManager();
         $em->remove($classroom);
         $em->flush();
         return $this->redirectToRoute('AfficheClassroomAction'); 
         

     }
    /**
     * @Route("Classroom/addClassroom",name="addAction")
     */
    public function Add(Request $request):Response{
        $classroom=new Classroom();
        $form=$this->createForm(ClassroomType::class,$classroom);
        $form->add('Ajouter',SubmitType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($classroom);
            $em->flush();
            return $this->redirectToRoute('AfficheClassroomAction');
        }
        return $this->render('classroom/add.html.twig',['formulaire'=>$form->createView()]);

    }


/**
 * @param $identifiant
 * @Route("/update/{identifiant}",name="modif")
 */
public function Update(ClassroomRepository $repo,$identifiant,Request $request) {

    $classroom=$repo->find($identifiant);
    $form=$this->createForm(ClassroomType::class,$classroom);
    $form->add('Update',SubmitType::class);
    $form->handleRequest($request );

    if($form->isSubmitted() && $form->isValid()){
    $em=$this->getDoctrine()->getManager();
    $em->flush($classroom);
    return $this->redirectToRoute('AfficheClassroomAction'); }
    


return $this->render('classroom/add.html.twig',['formulaire'=>$form->createView()]);}


}
