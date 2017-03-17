<?php
/**
 * Created by PhpStorm.
 * User: l.bizi
 * Date: 17/03/2017
 * Time: 12:26
 */

namespace AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SurveyCreatorController extends Controller
{
    public function surveyCreatorAction() {


        return $this->render('AdminBundle:Surveys:surveyCreator.html.twig');

    }
}