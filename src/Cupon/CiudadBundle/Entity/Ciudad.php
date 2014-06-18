<?php 
namespace Cupon\CiudadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
*/
class Ciudad
{
	protected $id;
	protected $nombre;
	protected $slug;
}

