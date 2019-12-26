<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cita
 *
 * @ORM\Table(name="Cita")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CitaRepository")
 */
class Cita
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fecha", type="datetimetz")
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="Deposito", type="float")
     */
    private $deposito;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="citas")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $cliente;  

    /**
     * @ORM\ManyToOne(targetEntity="TipoTrabajo", inversedBy="citas")
     * @ORM\JoinColumn(name="tipo_trabajo_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $tipo_trabajo;

    /**
     * @ORM\ManyToOne(targetEntity="Artista", inversedBy="citas")
     * @ORM\JoinColumn(name="artista_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $artista;

    /**
     * @ORM\OneToMany(targetEntity="Trabajo", mappedBy="cita")
     */
    protected $trabajos;

    public function __construct()
    {
        $this->trabajos = new ArrayCollection();
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Cita
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set deposito
     *
     * @param float $deposito
     * @return Cita
     */
    public function setDeposito($deposito)
    {
        $this->deposito = $deposito;

        return $this;
    }

    /**
     * Get deposito
     *
     * @return float 
     */
    public function getDeposito()
    {
        return $this->deposito;
    }
    
    /**
     * Set cliente
     *
     * @param \AppBundle\Entity\Cliente $cliente
     * @return Cita
     */
    public function setCliente(\AppBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return \AppBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set tipo_trabajo
     *
     * @param \AppBundle\Entity\TipoTrabajo $tipoTrabajo
     * @return Cita
     */
    public function setTipoTrabajo(\AppBundle\Entity\TipoTrabajo $tipoTrabajo = null)
    {
        $this->tipo_trabajo = $tipoTrabajo;

        return $this;
    }

    /**
     * Get tipo_trabajo
     *
     * @return \AppBundle\Entity\TipoTrabajo 
     */
    public function getTipoTrabajo()
    {
        return $this->tipo_trabajo;
    }

    /**
     * Set artista
     *
     * @param \AppBundle\Entity\Artista $artista
     * @return Cita
     */
    public function setArtista(\AppBundle\Entity\Artista $artista = null)
    {
        $this->artista = $artista;

        return $this;
    }

    /**
     * Get artista
     *
     * @return \AppBundle\Entity\Artista 
     */
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * Add trabajos
     *
     * @param \AppBundle\Entity\Trabajo $trabajos
     * @return Cita
     */
    public function addTrabajo(\AppBundle\Entity\Trabajo $trabajos)
    {
        $this->trabajos[] = $trabajos;

        return $this;
    }

    /**
     * Remove trabajos
     *
     * @param \AppBundle\Entity\Trabajo $trabajos
     */
    public function removeTrabajo(\AppBundle\Entity\Trabajo $trabajos)
    {
        $this->trabajos->removeElement($trabajos);
    }

    /**
     * Get trabajos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrabajos()
    {
        return $this->trabajos;
    }
}
