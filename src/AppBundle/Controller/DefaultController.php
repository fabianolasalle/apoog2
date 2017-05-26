<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Classes\FilterManager;
use AppBundle\Classes\Filter;

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
     * @Route("/filter", name="filter")
     */
    public function filterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository("AppBundle:Item")->getToSelect();

        return $this->render("default/filter.html.twig", [
            "items" => $items
        ]);
    }

    /**
     * @Route("/map", name="map")
     */
    public function mapAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $filterManager = $this->getFilterManager($request);

        $enderecoRepository = $em->getRepository("AppBundle:Endereco");
        $enderecoRepository->filterManager = $filterManager;
        $enderecos = $enderecoRepository->getLatitudeLongitudeWithFilter();

        return $this->render("default/map.html.twig", [
            "points" => $enderecos
        ]);
    }

    private function getFilterManager(Request $request) : FilterManager
    {
        $filterManager = new FilterManager();
        foreach ($request->request as $field => $value) {
            if ($field == "items") {
                $filterManager->addFilter(new Filter("item", "i.id in", $value));
            }
        }

        return $filterManager;
    }
}
