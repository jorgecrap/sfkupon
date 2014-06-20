<?php

namespace Cupon\OfertaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller {

    public function portadaAction($ciudad) {

        $em = $this->getDoctrine()->getManager();

        $oferta = $em->getRepository('OfertaBundle:Oferta')->findOfertaDelDia($ciudad);

        if (!$oferta) {
            throw $this->createNotFoundException(
                'No se ha encontrado la oferta del día'
            );
        }

        return $this->render(
                'OfertaBundle:Default:portada.html.twig', array('oferta' => $oferta)
        );
    }

}
