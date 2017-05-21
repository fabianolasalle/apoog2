<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
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
     * @ORM\Column(name="usuario", type="string", length=20, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=64, nullable=true)
     */
    private $senha;

    /**
     * @var integer
     *
     * @ORM\Column(name="nivel_acesso", type="integer", nullable=true)
     */
    private $nivelAcesso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="excluido", type="boolean", nullable=false)
     */
    private $excluido = '0';



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
     * Set usuario
     *
     * @param string $usuario
     *
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set senha
     *
     * @param string $senha
     *
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set nivelAcesso
     *
     * @param integer $nivelAcesso
     *
     * @return Usuario
     */
    public function setNivelAcesso($nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;

        return $this;
    }

    /**
     * Get nivelAcesso
     *
     * @return integer
     */
    public function getNivelAcesso()
    {
        return $this->nivelAcesso;
    }

    /**
     * Set excluido
     *
     * @param boolean $excluido
     *
     * @return Usuario
     */
    public function setExcluido($excluido)
    {
        $this->excluido = $excluido;

        return $this;
    }

    /**
     * Get excluido
     *
     * @return boolean
     */
    public function getExcluido()
    {
        return $this->excluido;
    }
}
