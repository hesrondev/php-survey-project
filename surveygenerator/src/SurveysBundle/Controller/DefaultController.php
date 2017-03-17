<?php

namespace SurveysBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SurveysBundle:Default:index.html.twig');
    }
}
