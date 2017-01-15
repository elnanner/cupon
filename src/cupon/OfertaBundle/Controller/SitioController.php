<?php
namespace cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SitioController extends Controller{
	
	public function estaticaAction($pagina){
		return $this->render('OfertaBundle:Sitio:'.$pagina.'.html.twig');
	}
}