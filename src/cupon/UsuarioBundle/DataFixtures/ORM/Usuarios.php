<?php
namespace Cupon\UsuarioBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use cupon\UsuarioBundle\Entity\Usuario;
use cupon\CiudadBundle\Entity\Ciudad;

use Doctrine\ORM\Mapping\Entity as ORM;
class Usuarios implements FixtureInterface, ContainerAwareInterface {
	private $container;
	public function setContainer(ContainerInterface $container = null) {
		$this->container = $container;
	}
	public function load(ObjectManager $manager) {
		$ciudad = new Ciudad();
		$ciudad->setNombre("Chascomús");
		$ciudad->setSlug("chascomus");
		$manager->persist($ciudad);
		for($i = 1; $i <= 50; $i ++) {
			$usuario = new Usuario ();
			$usuario->setNombre('usuario'.$i);
			$usuario->setApellidos('apellido' . $i);
			$usuario->setEmail('usuario'.$i.'@localhost');
			$usuario->setDireccion("dirrecion".$i);
			$usuario->setFechaAlta(new \DateTime());
			$usuario->setDni('dni'.$i);
			$usuario->setFechaNacimiento(new \DateTime());
			$usuario->setNumeroTarjeta('1234');
			$usuario->setPermiteEmail(1);
			$usuario->setSalt("usuario");
			
			$usuario->setCiudad($ciudad);
			$passwordEnClaro = 'usuario' . $i;
			$salt = md5 ( time () );
			$encoder = $this->container->get ( 'security.encoder_factory' )->getEncoder ( $usuario );
			$password = $encoder->encodePassword ( $passwordEnClaro, $salt );
			$usuario->setPassword ( $password );
			$usuario->setSalt ( $salt );
			$manager->persist($usuario);
		}
		
		$manager->flush();
	}
}