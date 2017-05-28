<?php

namespace AppBundle\Repository;

/**
 * ItemRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ItemRepository extends \Doctrine\ORM\EntityRepository
{
    public function getToSelect()
    {
        return $this->getEntityManager()
                    ->createQuery("SELECT item.id, item.codigo, item.descricao FROM AppBundle:Item item")
                    ->getResult();
    }
}
