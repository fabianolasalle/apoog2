<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PedidoItem
 *
 * @ORM\Table(name="pedido_item", indexes={@ORM\Index(name="id_pedido", columns={"id_pedido"}), @ORM\Index(name="id_item", columns={"id_item"})})
 * @ORM\Entity
 */
class PedidoItem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Pedido
     *
     * @ORM\ManyToOne(targetEntity="Pedido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pedido", referencedColumnName="id")
     * })
     */
    private $idPedido;

    /**
     * @var \Item
     *
     * @ORM\ManyToOne(targetEntity="Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_item", referencedColumnName="id")
     * })
     */
    private $idItem;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPedido
     *
     * @param \AppBundle\Entity\Pedido $idPedido
     *
     * @return PedidoItem
     */
    public function setIdPedido(\AppBundle\Entity\Pedido $idPedido = null)
    {
        $this->idPedido = $idPedido;

        return $this;
    }

    /**
     * Get idPedido
     *
     * @return \AppBundle\Entity\Pedido
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set idItem
     *
     * @param \AppBundle\Entity\Item $idItem
     *
     * @return PedidoItem
     */
    public function setIdItem(\AppBundle\Entity\Item $idItem = null)
    {
        $this->idItem = $idItem;

        return $this;
    }

    /**
     * Get idItem
     *
     * @return \AppBundle\Entity\Item
     */
    public function getIdItem()
    {
        return $this->idItem;
    }
}
