<?php
/**
 *
 * @author Luciano
 *
 */
namespace cupon\OfertaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Venta{

	/** @ORM\Column(type="datetime") */
	protected $fecha;

	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="cupon\OfertaBundle\Entity\Oferta")
	 */
	protected $oferta;

	/**
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="cupon\UsuarioBundle\Entity\Usuario")
	 */
	protected $usuario;

	public function setFecha($fecha){
		$this->fecha = $fecha;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function setOferta(cupon\OfertaBundle\Entity\Oferta $oferta){
		$this->oferta = $oferta;
	}

	public function getOferta(){
		return $this->oferta;
	}

	public function setUsuario (cupon\UsuarioBundle\Entity\Usuario $usuario){
		$this->usuario = $usuario;
	}

	public function getUsuario(){
		return $this->usuario;
	}

}
