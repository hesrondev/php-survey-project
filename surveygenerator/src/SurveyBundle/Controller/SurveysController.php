<?php

namespace SurveyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SurveysController extends Controller
{
    public function surveysAction()
    {
        return $this->render('SurveyBundle:Surveys:surveys.html.twig');
    }
}
