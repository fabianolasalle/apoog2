<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnderecoRepository")
 */
class Endereco
{
	/**
	 * @ORM\Column(type="integer", name="id", unique=true, nullable=false)
	 * @ORM\Id
	 */
	private $id;


	/**
	 * @ORM\Column(type="string", name="logradouro", length=90, unique=false, nullable=false)
	 */
	private $logradouro;

	/**
	 * @ORM\Column(type="string", name="cidade", length=50, unique=false, nullable=false)
	 */
	private $cidade;

	/**
	 * @ORM\Column(type="string", name="estado", length=30, unique=false, nullable=false)
	 */
	private $estado;

	/**
	 * @ORM\Column(type="string", name="uf", length=2, unique=false, nullable=false)
	 */
    private $uf;

	/**
	 * @ORM\Column(type="string", name="bairro", length=40, unique=false, nullable=false)
	 */
    private $bairro;

	/**
	 * @ORM\Column(type="string", name="cep", length=9, unique=false, nullable=false)
	 */
    private $cep;

    /**
     * @ORM\Column(type="decimal", name="latitude", nullable=false, scale=0, precision=6)
     */
    protected $latitude;
    
    /**
     * @ORM\Column(type="decimal", name="longitude", nullable=false, scale=0, precision=6)
     */
    private $longitude;

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Endereco
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * Set logradouro
     *
     * @param string $logradouro
     *
     * @return Endereco
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    /**
     * Get logradouro
     *
     * @return string
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * Set cidade
     *
     * @param string $cidade
     *
     * @return Endereco
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get cidade
     *
     * @return string
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Endereco
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set uf
     *
     * @param string $uf
     *
     * @return Endereco
     */
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }

    /**
     * Get uf
     *
     * @return string
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     *
     * @return Endereco
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set cep
     *
     * @param string $cep
     *
     * @return Endereco
     */
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get cep
     *
     * @return string
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Endereco
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Endereco
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}
