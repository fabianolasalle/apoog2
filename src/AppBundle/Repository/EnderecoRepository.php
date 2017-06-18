<?php

namespace AppBundle\Repository;

use Symfony\Component\HttpFoundation as HttpFoundation;
use AppBundle\Classes as Classes;

/**
 * EnderecoReposity
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EnderecoRepository extends \Doctrine\ORM\EntityRepository
{
    public $filterManager;

    public function getLatitudeLongitude()
    {
        return $this->getEntityManager()
                    ->createQuery("
						SELECT e.latitude, e.longitude FROM AppBundle:Endereco e
					")
                    ->getResult();
    }

    public function getLatitudeLongitudeWithFilter($extraColumn = null)
    {
        $queryBuilder = $this->getEntityManager()
                            ->createQueryBuilder()
                            ->select(["e.latitude", "e.longitude", "c.dataNascimento", "c.nome", "p.total", "p.dataHoraPedido", "p.dataHoraEntrega", "p.id"])
                            ->from("AppBundle:Endereco", "e")
                            ->innerJoin("AppBundle:Cliente", "c", "WITH", "c.idEndereco = e.id")
                            ->innerJoin("AppBundle:Pedido", "p", "WITH", "p.idCliente = c.id")
                            ->innerJoin("AppBundle:PedidoItem", "pi", "WITH", "pi.idPedido = p.id")
                            ->innerJoin("AppBundle:Item", "i", "WITH", "pi.idItem = i.id")
                            ->distinct();

        if (!empty($this->filterManager)) {
            $queryBuilder = $this->filterManager->applyFilters($queryBuilder);
        }

        if (!empty($extraColumn)) {
            $queryBuilder->addSelect("{$extraColumn} as weight");
            $queryBuilder->orderBy("weight", "DESC");
        }


        // echo $queryBuilder->getDQL();

        $enderecos = $queryBuilder->getQuery()
                                    ->getResult();

        // var_dump($enderecos);
        // die;

        return $enderecos;
    }
}
