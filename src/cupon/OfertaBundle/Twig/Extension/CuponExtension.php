<?php

namespace cupon\OfertaBundle\Twig\Extension;

class CuponExtension extends \Twig_Extension {
	
	/*
	 * Cuando se hace una extension hay que implemtar los metodos 
	 * getFilters para registrar los filtros 
	 * getFuncions para poder devolver los metodos
	 * etc etc... ver manual de twig
	 */
	public function getFunctions(){
		return array('saludo' => new \Twig_Function_Method($this, 'saludo'));
	}
	public function saludo(){
		return "saludandote...";
	}
	
	public function getName(){
		return 'cupon';
	}
}