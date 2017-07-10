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
        $em->getConfiguration()->addCustomNumericFunction('FLOOR', 'AppBundle\Query\MysqlFloor');
        
        
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
        $hasData = false;

        if (count($enderecos) > 0) {
            // Trata os endereços
            foreach ($enderecos as &$endereco) {
                $dateInterval = $endereco["dataHoraEntrega"]->diff($endereco["dataHoraPedido"]);
                $endereco["tempoEntrega"] = $dateInterval->format("%H:%I:%S");
                $endereco["infoWindow"] = $this->get("twig")->render("default/infowindow.html.twig", array("data" => $endereco));
            }
            $hasData = true;
        }

        return $this->render("default/map.html.twig", [
            "points" => $enderecos,
            "hasData" => $hasData,
            "filters"   => $filterManager->getFilters()
        ]);
    }

    private function getFilterManager(Request $request) : FilterManager
    {
        $filterManager = new FilterManager();
        foreach ($request->request as $field => $value) {
            if ($field == "items") {
                $filterManager->addFilter(new Filter("item", "i.id in", $value, "Itens"));
            }

            if ($field == "periodoInicio") {
                $value = \DateTime::createFromFormat('d/m/Y H:i', $value);
                $filterManager->addFilter(new Filter("periodoinico", "p.dataHoraEntrega >=", $value->format("Y-m-d H:i"), "Início do período de entrega"));
            }

            if ($field == "periodoFim") {
                $value = \DateTime::createFromFormat('d/m/Y H:i', $value);
                $filterManager->addFilter(new Filter("periodofim", "p.dataHoraEntrega <=", $value->format("Y-m-d H:i"), "Fim do período de entrega"));
            }

            if ($field == "idadeInicio" && !empty($value)) {
                $filterManager->addFilter(new Filter("idadeInicio", "FLOOR(DATE_DIFF(CURRENT_DATE(), c.dataNascimento) / 365) >=", $value, "Início intervalo de idade"));
            }

            if ($field == "idadeFim"  && !empty($value)) {
                $filterManager->addFilter(new Filter("idadeFim", "FLOOR(DATE_DIFF(CURRENT_DATE(), c.dataNascimento) / 365) <=", $value, "Fim intervalo de idade"));
            }
        }

        return $filterManager;
    }
}
