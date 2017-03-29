<?php

namespace QcmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CorrectionController extends Controller
{
    public function indexAction()
    {
    	
        return $this->render('QcmBundle:Correction:correction.html.twig');
    }
}