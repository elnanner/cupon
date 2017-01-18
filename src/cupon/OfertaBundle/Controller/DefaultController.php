<?php

namespace cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;


class DefaultController extends Controller
{
    public function ayudaAction()
    {
        return $this->render('OfertaBundle:Default:index.html.twig', array('name' => 'luciano'));
    }
    
    public function portadaAction($ciudad){
		$em = $this->getDoctrine()->getManager();
		$oferta = $em->getRepository('OfertaBundle:Oferta')->findOfertaDelDia($ciudad);
 		if (!$oferta) {
 			throw $this->createNotFoundException(
 					'No se ha encontrado la oferta del día'
 					);
 		}
		return $this->render('portada.html.twig', array('oferta'=>$oferta));
		
		
    }
    
    public function pedidoAction(){
    	$req = $this->getRequest()->hasSession();
    	$respuesta = new Response();
    	$respuesta->setContent(var_dump($req));
    	return $respuesta->sendContent();//new Response(var_dump($req));
    }
    
    
    public function ofertaAction($ciudad, $slug){
    	$em = $this->getDoctrine()->getManager();
    	$oferta = $em->getRepository('OfertaBundle:Oferta')
    			->findOferta($ciudad, $slug);
     	return $this->render('OfertaBundle:Default:detalle.html.twig', array(
     		'oferta' => $oferta	
     	));
		echo $oferta->getTienda();
    }
}
