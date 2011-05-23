<?php

namespace Montes\AdictosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MontesAdictosBundle:Default:index.html.twig');
    }
}
