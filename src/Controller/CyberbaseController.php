<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lesson;
use Symfony\Component\HttpFoundation\Request;


class CyberbaseController extends AbstractController
{
    /**
     * @Route("/cyberbase", name="cyberbase")
     */
    public function index()
    {
        return $this->render('cyberbase/index.html.twig', [
            'controller_name' => 'CyberbaseController',
        ]);
    }

/**
 * @Route("/",name="home")
 */
    public function home()
    {return $this->render('cyberbase/home.html.twig');}

    /**
 * [create description]
 * @Route("/newLesson",name= "new_lesson")
 */
        public function createLesson(Request $request){
            $lesson= new Lesson();
            $formLesson = $this->createFormBuilder($lesson)
            ->add('title')
            ->add('video')
            ->add('image')
            ->add('quizz')
            ->add('description')
            ->add('level')
            ->getForm();
            return $this->render('cyberbase/createlesson.html.twig',['formLesson'=> $formLesson->createView()]);
        }

/**
 * @Route("/cour/{id}",name="lesson")
 */
    public function cour($id){
$repo =$this->getDoctrine()->getRepository(Lesson::class);
      $lesson=$repo->find($id);  


        return $this->render('cyberbase/lesson.html.twig',['lesson' => $lesson]);}
    /**
 * @Route("/courListe",name="lessonList")
 */
    public function courListe(){
//voir le bonus magnifique injection des dependence
        $repo =$this->getDoctrine()->getRepository(Lesson::class);
        $lessons=$repo->findAll();
        return $this->render('cyberbase/lessonList.html.twig',[
            'lessons'=> $lessons
        ]);}

}
