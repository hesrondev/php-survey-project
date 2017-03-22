<?php

namespace QcmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QcmBundle\Entity\Question;
use QcmBundle\Entity\QuestionNonPersistee;
use QcmBundle\Entity\Choix;
use QcmBundle\Entity\Questionnaire;
use QcmBundle\Entity\QuestionChoix;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;




class QuestionnaireController extends Controller
{

	 public function questionAction(Request $request)
    {
    		
    		$listeQuestionChoix = array();
	    	$chx = new Choix();

	    	$em = $this->getDoctrine()->getManager();
			$repositoryQuestion = $em->getRepository('QcmBundle:Question');
			$repositoryChoix = $em->getRepository('QcmBundle:Choix');

			$questionsAll = array();
			$rq = $request->request->all();
			$tabIdQuestionnaireChoisi = array_keys($rq);
			if(sizeof($tabIdQuestionnaireChoisi)>0)
				$questionsAll = $repositoryQuestion->findByQuestionnaire($tabIdQuestionnaireChoisi[0]);

			foreach($questionsAll as $question)
			{
					$listechoixDuneQuestion = $repositoryChoix->findByQuestion($question);

					if(sizeof($listechoixDuneQuestion)>0)
					{
						$questionChoix = new QuestionChoix();
						foreach($listechoixDuneQuestion as $choixDuneQuestion)
						{
							
							$questionChoix->setIdQuestion($question->getId());
							$questionChoix->setLibelle($question->getLibelle());
							$questionChoix->addChoix($choixDuneQuestion);
							
						}
						array_push($listeQuestionChoix,$questionChoix);
						
					}
			}


			$formBuilderQuestionnaire = $this->createFormBuilder();
			$listeform = array();
			$listeQuestion = array();
			$formBuilder=null;
			$i=0;

			foreach($listeQuestionChoix as $quest)
		    {
		    	
		    	$listeChoixDuneQuestion = $quest->getListeChoix();

		    	$formBuilder = $this->get('form.factory')->createNamedBuilder($i,FormType::class, $quest);
			    $formBuilder
			      ->add('libelle',  QuestionChoix::class,array('libelle'=>$quest->getLibelle()))
			      ->add('Valider', SubmitType::class, array('label' => 'Valider'));
			      
			      array_push($listeform,$formBuilder->getData());
			      $i++;
			     
			}

			
			$formBuilderQuestionnaire->add('Valider', SubmitType::class, array('label' => 'Valider'));

			$formResult = $formBuilderQuestionnaire->getForm();
			
	        return $this->render('QcmBundle:Questionnaire:questionnaire.html.twig',array('form'=>$listeform));
	}
    
    


    public function indexAction(Request $request)
    {

    	


    	if( $request->isMethod('POST'))
    	{

		 
		    
		  	$data = $request->request->all();

		  	$listeIdChoixSelectionne = array_keys($data);
		  	$listIdChoixCorrect = array();

		  	$em = $this->getDoctrine()->getManager();
    		$repositoryChoix = $em->getRepository('QcmBundle:Choix');

			$listechoix = $repositoryChoix->findAll();

			//listIdChoixCorrect contient la liste des idChoix qui sont corrects
			foreach($listechoix as $choix)
			{
				if($choix->getEstCorrect())
				{
					array_push($listIdChoixCorrect,$choix->getId());
				}
			}


			$nombreBonneReponse = 0;

			foreach($listeIdChoixSelectionne as $idChoixEffectue)
			{
				
					
					if (in_array($idChoixEffectue, $listIdChoixCorrect))
					{
						$nombreBonneReponse++;
					}

				
			}

			return $this->render('QcmBundle:Questionnaire:resultat.html.twig', array('formResultat' => $nombreBonneReponse));
		
    		

    	}
    	
    }
}
