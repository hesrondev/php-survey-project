<?php

namespace QcmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AcceuilController extends Controller
{
    public function indexAction(Request $request)
    {
	   if( $request->isMethod('POST'))
	   {
    		$data = $request->request->all();
		  	$tabIdQuestionnaireSelectionne = array_keys($data);

		  	$response = $this->forward('QcmBundle:Questionnaire:question', array('formQuestionnaire'=> $data));
			return $response;
       }
       else
       {
			$em = $this->getDoctrine()->getManager();
    		$repositoryChoix = $em->getRepository('QcmBundle:Questionnaire');

			$listeQuestionnaire = $repositoryChoix->findAll();
			$arrayQuestionnaire = array();
			

			foreach($listeQuestionnaire as $questionnaire)
			{
				
					array_push($arrayQuestionnaire,$questionnaire);
				
			}
        	return $this->render('QcmBundle:Acceuil:acceuil.html.twig',array('formAcceuil' => $arrayQuestionnaire));

       }
    }

}
