<?php

namespace cupon\TiendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;


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
     * @Route("/{ciudad}/tiendas/{tienda}", name="portada_tienda")
     * @Template("TiendaBundle:Default:infotienda.html.twig")
     */
    public function portadaAction($ciudad, $tienda){
    	$em = $this->getDoctrine()->getManager();
    	$ciu = $em->getRepository("CiudadBundle:Ciudad")->findOneBy(array('slug'=>$ciudad));
    	//echo var_dump($ciu);
    	$tie = $em->getRepository('TiendaBundle:Tienda')->findOneBy(array('slug'=>$tienda , 'ciudad' => $ciu->getId()));
    	
    	return array('tienda'=>$tie, 'ciudad'=>$ciu);//retornar arreglo cuando se usa la anotacion @Template
    }
}
