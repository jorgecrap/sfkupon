<?php

namespace Cupon\CiudadBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cupon\CiudadBundle\Entity\Ciudad;

class Ciudades implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $ciudades = array(
            array('nombre' => 'Almería'),
            array('nombre' => 'Cádiz'),
            array('nombre' => 'Córdoba'),
            array('nombre' => 'Granada'),
            array('nombre' => 'Huelva'),
            array('nombre' => 'Jaén'),
            array('nombre' => 'Málaga'),
            array('nombre' => 'Sevilla'),
            array('nombre' => 'Huesca'),
            array('nombre' => 'Teruel'),
            array('nombre' => 'Zaragoza'),
            array('nombre' => 'Oviedo'),
            array('nombre' => 'Palma de Mallorca'),
            array('nombre' => 'Las Palmas de Gran Canaria'),
            array('nombre' => 'Santa Cruz de Tenerife'),
            array('nombre' => 'Santander'),
            array('nombre' => 'Albacete'),
            array('nombre' => 'Ciudad Real'),
            array('nombre' => 'Cuenca'),
            array('nombre' => 'Guadalajara'),
            array('nombre' => 'Toledo'),
            array('nombre' => 'Ávila'),
            array('nombre' => 'Burgos'),
            array('nombre' => 'León'),
            array('nombre' => 'Palencia'),
            array('nombre' => 'Salamanca'),
            array('nombre' => 'Segovia'),
            array('nombre' => 'Soria'),
            array('nombre' => 'Valladolid'),
            array('nombre' => 'Zamora'),
            array('nombre' => 'Barcelona'),
            array('nombre' => 'Gerona'),
            array('nombre' => 'Lérida'),
            array('nombre' => 'Tarragona'),
            array('nombre' => 'Alicante'),
            array('nombre' => 'Castellón de la Plana'),
            array('nombre' => 'Valencia'),
            array('nombre' => 'Badajoz'),
            array('nombre' => 'Cáceres'),
            array('nombre' => 'La Coruña'),
            array('nombre' => 'Lugo'),
            array('nombre' => 'Orense'),
            array('nombre' => 'Pontevedra'),
            array('nombre' => 'Logroño'),
            array('nombre' => 'Madrid'),
            array('nombre' => 'Pamplona'),
            array('nombre' => 'Vitoria'),
            array('nombre' => 'San Sebastián'),
            array('nombre' => 'Bilbao'),
            array('nombre' => 'Murcia')
        );
        foreach ($ciudades as $ciudad) {
            $entidad = new Ciudad();
            $entidad->setNombre($ciudad['nombre']);
            $manager->persist($entidad);
        }
        $manager->flush();
    }

}
