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
        $findme   = '*';
         $question = explode("!", $question);
            $numQuestion=count($question);
        
            for ($i=1; $i <$numQuestion ; $i++) { 
                $reponse[$i] = explode("-", $question[$i]);
                $arrayQuestion[]='<br><b>'.$reponse[$i][0].'</b><br><br>';
                 $lenght=count($reponse[$i]);
                            for ($x=1; $x <$lenght ; $x++) { 
                        
                              $pos = strpos($reponse[$i][$x], $findme);
                              

                                        
                            if ($pos === false){ $reponse[$i][$x]='<input type="radio" name="a1" value="0">'.$reponse[$i][$x].'<br>';}
                            
                             else{$answer=explode("*",$reponse[$i][$x]);
                                $reponse[$i][$x]='<input type="radio" name="a1" value="1">'.$answer[1].'<br>';}
                                $arrayQuestion[]=$reponse[$i][$x];
                                
                                    
          }
            
        }
        
        
     
        
        return $this->render('cyberbase/lesson.html.twig',['lesson' => $lesson,
                                                            'question'=>$arrayQuestion,
                                                            //'reponse'=>$arrayAnswer
        ]);}
}
