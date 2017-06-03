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
        $weight = $request->request->get("weight");

        $weightColumn = null;
        if ($weight == "tempo") {
            $weightColumn = "p.dataHoraEntrega - p.dataHoraPedido";
        } elseif ($weight == "total") {
            $weightColumn = "p.total";
        }

        $enderecoRepository = $em->getRepository("AppBundle:Endereco");
        $enderecoRepository->filterManager = $filterManager;

        $enderecos = $enderecoRepository->getLatitudeLongitudeWithFilter($weightColumn);

        // Trata os endereços
        foreach ($enderecos as &$endereco) {
            $dateInterval = $endereco["dataHoraEntrega"]->diff($endereco["dataHoraPedido"]);
            $endereco["tempoEntrega"] = $dateInterval->format("%H:%i:%s");
            $endereco["infoWindow"] = $this->get("twig")->render("default/infowindow.html.twig", array("data" => $endereco));
        }

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

            if ($field == "periodoInicio") {
                $filterManager->addFilter(new Filter("periodoinico", "p.dataHoraEntrega >=", $value));
            }

            if ($field == "periodoFim") {
                $filterManager->addFilter(new Filter("periodofim", "p.dataHoraEntrega <=", $value));
            }
        }

        return $filterManager;
    }
}
