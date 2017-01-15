<?php

namespace cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    public function ayudaAction()
    {
        return $this->render('OfertaBundle:Default:index.html.twig', array('name' => 'luciano'));
    }
    
    public function portadaAction(){
    	$em = $this->getDoctrine()->getEntityManager();
    	$admin = $em->find('UsuarioBundle:Usuario', 1);
    	
    	return new Response("<h2><center> Bienvenidos al mi sitio - 
    			".$admin->getNombre()." ".$admin->getApellidos()."</center></h2>");
    	
    }
    
}
