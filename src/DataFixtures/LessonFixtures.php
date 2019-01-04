<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Lesson;

class LessonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {


    	for ($i=0; $i <=10 ; $i++) { 
    		
    		$lesson= new Lesson();

    		$lesson->setTitle("titre numero $i");
    		$lesson->setVideo("http://adresse video");
    		$lesson->setImage("http://placehold.it/500x300");
    		$lesson->setQuizz("<p>Lorem ipsum dolor sit amet.</p>");
    		$lesson->setDescription("<p>Lorem ipsum dolor sit amet.</p>");
    		$lesson->setLevel(2);
    		
$manager->persist($lesson);

    		
    	}
        

        $manager->flush();
    }
}
