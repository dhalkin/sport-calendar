<?php

namespace Assignment\SportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/dashboard")
     * @Template()
     */
    public function dashboardAction()
    {
        return array('name' => "asasasas");
    }
}
