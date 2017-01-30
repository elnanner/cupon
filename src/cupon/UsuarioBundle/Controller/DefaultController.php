<?php

namespace cupon\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContext;
use cupon\UsuarioBundle\Entity\Usuario;

class DefaultController extends Controller
{
    public function comprasAction(){
    	$usuario_id = 1;
    	$em = $this->getDoctrine();
    	$compras = $em->getRepository('UsuarioBundle:Usuario')
    					->findTodasLasCompras($usuario_id);
    	return $this->render('UsuarioBundle:Default:compras.html.twig', 
    			array('compras' => $compras, 'usuario'=>$this->getUser()));
    }
    
    public function loginAction(){
    	$peticion = $this->getRequest();
		$sesion = $peticion->getSession();
		$error = $peticion->attributes->get(
			SecurityContext::AUTHENTICATION_ERROR,
			$sesion->get(SecurityContext::AUTHENTICATION_ERROR));
		
		return $this->render('UsuarioBundle:Default:login.html.twig', array(
			'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
			'error' => $error
		));
    }
    
    public function cajaLoginAction(){
    	$peticion = $this->getRequest();
		$sesion = $peticion->getSession();
		$error = $peticion->attributes->get(
			SecurityContext::AUTHENTICATION_ERROR,
			$sesion->get(SecurityContext::AUTHENTICATION_ERROR));
		
		return $this->render('UsuarioBundle:Default:cajaLogin.html.twig', array(
			'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
			'error' => $error
		));
    }
    
    public function defaultAction()
    {
    	$usuario = new Usuario();
    	$encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
    	
    	$password = $encoder->encodePassword('luciano', $usuario->getSalt());
    	$usuario->setPassword($password);
    }
    
}
