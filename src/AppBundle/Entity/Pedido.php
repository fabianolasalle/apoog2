<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="id_cliente", columns={"id_cliente"})})
 * @ORM\Entity
 */
class Pedido
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
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=10, nullable=true)
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_hora_pedido", type="datetime", nullable=false)
     */
    private $dataHoraPedido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_hora_entrega", type="datetime", nullable=false)
     */
    private $dataHoraEntrega;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=true)
     */
    private $idUsuario;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float", nullable=true)
     */
    private $total;


    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id")
     * })
     */
    private $idCliente;



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
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Pedido
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set dataHoraPedido
     *
     * @param \DateTime $dataHoraPedido
     *
     * @return Pedido
     */
    public function setDataHoraPedido($dataHoraPedido)
    {
        $this->dataHoraPedido = $dataHoraPedido;

        return $this;
    }

    /**
     * Get dataHoraPedido
     *
     * @return \DateTime
     */
    public function getDataHoraPedido()
    {
        return $this->dataHoraPedido;
    }

    /**
     * Set dataHoraEntrega
     *
     * @param \DateTime $dataHoraEntrega
     *
     * @return Pedido
     */
    public function setDataHoraEntrega($dataHoraEntrega)
    {
        $this->dataHoraEntrega = $dataHoraEntrega;

        return $this;
    }

    /**
     * Get dataHoraEntrega
     *
     * @return \DateTime
     */
    public function getDataHoraEntrega()
    {
        return $this->dataHoraEntrega;
    }

    /**
     * Set idUsuario
     *
     * @param integer $idUsuario
     *
     * @return Pedido
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set idCliente
     *
     * @param \AppBundle\Entity\Cliente $idCliente
     *
     * @return Pedido
     */
    public function setIdCliente(\AppBundle\Entity\Cliente $idCliente = null)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return \AppBundle\Entity\Cliente
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }
}
