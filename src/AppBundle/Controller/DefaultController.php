<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }


    /**
     * @Route("/map", name="map")
     */
    public function mapAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $enderecos = $em->getRepository("AppBundle:Endereco")->getLatitudeLongitude();

        return $this->render("default/map.html.twig", [
            "points" => $enderecos
        ]);
    }
}
