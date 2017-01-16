<?php
/**
 * 
 * Creando el archivo fixture para Ciudad
 */

namespace cupon\CiudadBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence;
use cupon\CiudadBundle\Entity\Ciudad;
use Doctrine\Common\Persistence\ObjectManager;

class Ciudades implements FixtureInterface{
	public function load(ObjectManager $manager){
		$ciudades = array(
				array('nombre'=>'Villa Elisa', 'slug'=>'villa-elisa'),
				array('nombre'=>'La Plata','slug'=>'la-plata'),
				array('nombre'=>'Gregorio de Laferrere', 'slug'=>'gregorio'),
				array('nombre'=>'General Belgrano', 'slug'=>'gral-belgrano'),
				array('nombre'=>'City Bell', 'slug'=>'city-bell'),
		);
		foreach ($ciudades as $ciudad) {
			$entidad = new Ciudad();
			$entidad->setNombre($ciudad['nombre']);
			$entidad->setSlug($ciudad['slug']);
			$manager->persist($entidad);
		}
		$manager->flush();
	}

	
}