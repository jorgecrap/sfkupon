<?php

namespace Cupon\OfertaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class OfertaRepository extends EntityRepository {

    public function findOfertaDelDia($ciudad) {
        $fechaPublicacion = new \DateTime('today');
        $fechaPublicacion->setTime(23, 59, 59);
        $em = $this->getEntityManager();
        $dql = 'SELECT o, c, t
                FROM OfertaBundle:Oferta o
                JOIN o.ciudad c JOIN o.tienda t
                WHERE o.revisada = true
                AND o.fechaPublicacion < :fecha
                AND c.slug = :ciudad
                ORDER BY o.fechaPublicacion DESC';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('fecha', $fechaPublicacion);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);
        return $consulta->getSingleResult();
    }

    public function findOferta($slug, $ciudad) {
        $em = $this->getEntityManager();
        $dql = 'SELECT o, c
                FROM OfertaBundle:Oferta o
               JOIN o.ciudad c JOIN o.tienda t
               WHERE o.revisada = true
               AND o.slug = :slug
               AND c.slug = :ciudad';
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('slug', $slug);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setMaxResults(1);
        return $consulta->getSingleResult();
    }

    public function findRelacionadas($ciudad) {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('
            SELECT o, c
            FROM OfertaBundle:Oferta o
            JOIN o.ciudad c
            WHERE o.revisada = true
            AND o.fechaPublicacion <= :fecha
            AND c.slug != :ciudad
            ORDER BY o.fechaPublicacion DESC');
        $consulta->setMaxResults(5);
        $consulta->setParameter('ciudad', $ciudad);
        $consulta->setParameter('fecha', new \DateTime('today'));
        return $consulta->getResult();
    }
    
    public function findRecientes($ciudad_id) {
        $em = $this->getEntityManager();
        $consulta = $em->createQuery('
            SELECT o, t
            FROM OfertaBundle:Oferta o
            JOIN o.tienda t
            WHERE o.revisada = true
            AND o.fechaPublicacion < :fecha
            AND o.ciudad = :id
            ORDER BY o.fechaPublicacion DESC');
        $consulta->setMaxResults(5);
        $consulta->setParameter('id', $ciudad_id);
        $consulta->setParameter('fecha', new \DateTime('today'));
        return $consulta->getResult();
    }

}
