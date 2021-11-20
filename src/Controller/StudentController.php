<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }

    /**
     * @Route("/message",name="msg")
     */
    public function MessageStudent (){
        return new Response("Bonjour mes étudiants !");

    }
    
    /**
     * @param StudentRepository $repo
     * @Route("/AfficheStudents",name="AfficheStudentAction")
     */

    public function ShowS(StudentRepository $repo) : Response {
        $studentS=$repo->findAll();
        return $this->render('student/afficheS.html.twig',['studentS' => $studentS]);

    
    }
     /**
     * @param StudentRepository $repo
     * @Route("/AfficheSname",name="AfficsheSnameAction")
     */

    public function ShowSname(StudentRepository $repo) : Response {
        $studentS=$repo->ShowSname();
                return $this->render('student/afficheS.html.twig',['studentS' => $studentS]);

}

 /**
     * @param StudentRepository $repo
     * @Route("/AfficheSlike",name="AfficsheSlikeAction")
     */

    public function ShowSlike(StudentRepository $repo) : Response {
        $studentS=$repo->ShowSnameQB();
                return $this->render('student/afficheS.html.twig',['studentS' => $studentS]);

}

  


/**
 * @param $identifiant
 * @Route("/deleteS/{identifiant}",name="delS")
 */
     public function DeleteS(StudentRepository $repo,$identifiant) {

         $student=$repo->find($identifiant);
         $em=$this->getDoctrine()->getManager();
         $em->remove($student);
         $em->flush();
         return $this->redirectToRoute('AfficheStudentAction'); 
         

     }
    /**
     * @Route("student/addStudent",name="addSAction")
     */
    public function AddS(Request $request):Response{
        $student=new Student();
        $form=$this->createForm(StudentType::class,$student);
        $form->add('Ajouter',SubmitType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('AfficheStudentAction');
        }
        return $this->render('student/addS.html.twig',['formulaire'=>$form->createView()]);

    }


/**
 * @param $identifiant
 * @Route("/updateS/{identifiant}",name="modifS")
 */
public function UpdateS(StudentRepository $repo,$identifiant,Request $request) {

    $student=$repo->find($identifiant);
    $form=$this->createForm(StudentType::class,$student);
    $form->add('Update',SubmitType::class);
    
    $form->handleRequest($request );

    if($form->isSubmitted() && $form->isValid()){
    $em=$this->getDoctrine()->getManager();
    $em->flush($student);
    return $this->redirectToRoute('AfficheStudentAction'); }
    


return $this->render('student/addS.html.twig',['formulaire'=>$form->createView()]);}







 /**
     * @Route("student/findStudent",name="findSAction")
     */
    public function FindS(Request $request,StudentRepository $repos):Response{
        $data=$request->get('searchNsc');
        $student=$repos->findBy(['nsc'=>$data ]);
        return $this->render('student/afficheS.html.twig',['studentS' => $student]);}

    }



