<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function portadaAction() {

        $em = $this->getDoctrine()->getManager();
        
        $fecha = new \DateTime();
        $fecha->setTime(23,59,59);
        
        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOneBy(array(
            'ciudad' => 1,
            'fechaPublicacion' => $fecha
        ));
        
        return $this->render(
                        'OfertaBundle:Default:portada.html.twig',
                        array('oferta' => $oferta)
                        );
    }
}
