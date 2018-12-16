<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Lesson;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\LessonType;
use App\Form\UserType;
use App\Repository\LessonRepository;


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
 * @Route("/cour/{id}/edit", name="lesson_edit")
 */
        public function formLesson(Lesson $lesson = null, Request $request,ObjectManager $manager){
            if (!$lesson) {
                 $lesson= new Lesson();
            }
           
           
            $form = $this->createForm(LessonType::class,$lesson);

            $form->handleRequest($request);
           
            if ($form->isSubmitted() && $form->isValid()) {

                 $manager->persist($lesson);
                $manager->flush();
             
                       
             return $this->redirectToRoute('lesson',['id'=> $lesson->getId()]);}
         
            return $this->render('cyberbase/createlesson.html.twig',
                ['formLesson'=> $form->createView(),
                'editMode'=> $lesson->getId() !== null
            ]);
        }

/**
 * @Route("/cour/{id}",name="lesson")
 */
    public function cour(Lesson $lesson){

        


        return $this->render('cyberbase/lesson.html.twig',['lesson' => $lesson]);}
    /**
 * @Route("/courListe",name="lessonList")
 */
    public function courListe(LessonRepository $repo){

        
        $lessons=$repo->findAll();
        return $this->render('cyberbase/lessonList.html.twig',[
            'lessons'=> $lessons
        ]);}

       
    /**
 * [create description]
 * @Route("/newUser",name= "new_user")
 * @Route("/utilisateur/{id}/edit", name="user_edit")
 */

        public function formUser(User $user = null, Request $request,ObjectManager $manager){
            if (!$user) {
                 $user= new User();
            }
           
           
            $form = $this->createForm(UserType::class,$user);

            $form->handleRequest($request);
           
            if ($form->isSubmitted() && $form->isValid()) {

                 $manager->persist($user);
                $manager->flush();
             
                       
             return $this->redirectToRoute('user',['id'=> $user->getId()]);}
         
            return $this->render('cyberbase/createuser.html.twig',
                ['formUser'=> $form->createView(),
                'editMode'=> $user->getId() !== null
            ]);
        }

}
