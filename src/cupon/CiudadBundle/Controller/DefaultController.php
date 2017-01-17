<?php

namespace cupon\CiudadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\RedirectResponse;
/**
 * 
 * @author Luciano
 *
 */
class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
   
    /**
     * @Route("/cambiar-a-{ciudad}", name="cambiar_ciudad")
     * @Template("CiudadBundle:Default:index.html.twig")
     */
    public function cambiarAction($ciudad)
    {
    	return new RedirectResponse($this->generateUrl('portada', array('ciudad' => $ciudad)));
    }
    
    /*para mostrar este listado en el frontend.html.twig*/
    public function listaCiudadesAction($ciudad = null){
    	$em = $this->getDoctrine()->getManager();
    	$ciudades = $em->getRepository('CiudadBundle:Ciudad')->findAll();
    	return $this->render('CiudadBundle:Default:listaCiudades.html.twig', 
    			array('ciudadActual' => $ciudad, 'ciudades' => $ciudades ));
    }
    
}
