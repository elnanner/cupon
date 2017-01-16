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
    	/*$em = $this->getDoctrine()->getEntityManager();
    	$admin = $em->find('UsuarioBundle:Usuario', 1);
    	
    	return new Response("<h2><center> Bienvenidos al mi sitio - 
    			".$admin->getNombre()." ".$admin->getApellidos()."</center></h2>");
    	*/
    	//al siguiente template se accede porque es "global" digamos Resources/views/
    	
    	$em = $this->getDoctrine()->getManager();
    	$oferta = $em->getRepository('OfertaBundle:Oferta')->findOfertaDelDia(1);
    	return  $this->render('portada.html.twig', array('oferta'=>$oferta));
    }
    
    public function pedidoAction(){
    	$req = $this->getRequest()->hasSession();
    	$respuesta = new Response();
    	$respuesta->setContent(var_dump($req));
    	return $respuesta->sendContent();//new Response(var_dump($req));
    }
}
