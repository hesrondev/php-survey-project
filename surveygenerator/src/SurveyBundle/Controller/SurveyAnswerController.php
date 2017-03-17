<?php
/**
 * Created by PhpStorm.
 * User: l.bizi
 * Date: 17/03/2017
 * Time: 12:11
 */

namespace SurveyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SurveyAnswerController extends Controller
{
    public function surveyAnswerController() {
        return $this->render('SurveyBundle:Surveys:surveyAnswer.html.twig');
    }
}
