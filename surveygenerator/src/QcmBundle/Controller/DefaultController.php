<?php

namespace QcmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('QcmBundle:Default:index.html.twig');
    }
}
