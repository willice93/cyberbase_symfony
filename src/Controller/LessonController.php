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

class LessonController extends AbstractController
{
    /**
     * @Route("/lesson", name="lesson_index")
     */
    public function index()
    {
        return $this->render('lesson/index.html.twig', [
            'controller_name' => 'LessonController',
        ]);
    }
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
* @Route("/courListe",name="lessonList")
*/
public function courListe(LessonRepository $repo){


$lessons=$repo->findAll();
return $this->render('cyberbase/lessonList.html.twig',[
    'lessons'=> $lessons
]);}

}
