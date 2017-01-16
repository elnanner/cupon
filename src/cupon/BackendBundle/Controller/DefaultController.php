<?php

namespace cupon\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/backend/")
     * @Template()
     */
    public function indexAction()
    {
        return new Response('Este es el Backend...');
    }
    
    /**
     * @Route("/luc/")
     * 
     */
    public function lucianoAction(){
    	return new Response("parte del backend ...!!!!");
    }
}
