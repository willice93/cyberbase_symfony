<?php

namespace App\Controller;

use App\Entity\Lesson;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QuizzController extends AbstractController
{
    /**
     * @Route("/quizz", name="quizz")
     */
    public function index()
    {
        return $this->render('quizz/index.html.twig', [
            'controller_name' => 'QuizzController',
        ]);
    }

    /**
* @Route("/cour/{id}",name="lesson")
*/
    public function cour(Lesson $lesson){
    
        //aller chercher le quizz dans le dossier public avec la variable quizz de la lesson et le chemin asset
        
        $question = file_get_contents('asset/qcm/'.$lesson->getQuizz().'', "r");
            
            $question = explode("!", $question);
            $numQuestion=count($question);
        for ($i=1; $i <$numQuestion ; $i++) { 
            $reponse[$i] = explode("-", $question[$i]);
          $arrayQuestion[]=$reponse[$i][0];
          $lenght=count($reponse[$i]);
          for ($x=1; $x <$lenght ; $x++) { 

              $arrayAnswer[$i][]=$reponse[$i][$x];
          }
            
        }
           
            
        
        var_dump( $arrayQuestion[0]);
            var_dump( $arrayAnswer[1]);
        
        return $this->render('cyberbase/lesson.html.twig',['lesson' => $lesson,
                                                            'question'=>$question
        ]);}
}
