<?php

namespace cupon\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * OfertaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OfertaRepository extends EntityRepository
{
	
	public function findOfertaDelDia($ciudad)
	{
		$em = $this->getEntityManager();
		$consulta = $em->createQuery('
            SELECT o
            FROM OfertaBundle:Oferta o
			JOIN o.ciudad c
			WHERE c.slug = :ciudad
        ');
		
		$consulta->setParameter('ciudad', $ciudad);
		$consulta->setMaxResults(1);
		return $consulta->getOneOrNullResult();
	}
	
	/*metodo que devuelve una oferta en base a una ciudad y un slug*/
	public function findOferta($ciudad, $slug){
		$em = $this->getEntityManager();
		$query = 'SELECT o,c,t
				  	FROM OfertaBundle:Oferta o
					JOIN o.ciudad c
					JOIN o.tienda t
					WHERE c.slug = :ciudad
					AND o.slug = :slug';
 		$consulta = $em->createQuery($query);
 		$consulta->setMaxResults(1);
 		$consulta->setParameter('ciudad', $ciudad);
 		$consulta->setParameter('slug', $slug);
		return $consulta->getSingleResult();
	}
}
