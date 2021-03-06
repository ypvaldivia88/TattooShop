<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pago
 *
 * @ORM\Table(name="Pago")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PagoRepository")
 */
class Pago
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
     * @ORM\Column(name="FechaInicial", type="date")
     */
    private $fechaInicial;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FechaFinal", type="date")
     */
    private $fechaFinal;

    /**
     * @var float
     *
     * @ORM\Column(name="Efectivo", type="float")
     */
    private $efectivo;

    /**
     * @ORM\ManyToOne(targetEntity="Artista", inversedBy="pagos")
     * @ORM\JoinColumn(name="artista_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $artista;

    /**
     * @ORM\OneToMany(targetEntity="Trabajo", mappedBy="pago")
     */
    protected $trabajos;

    
    /**
     * Constructor
     */
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
     * Set fechaInicial
     *
     * @param \DateTime $fechaInicial
     *
     * @return Pago
     */
    public function setFechaInicial($fechaInicial)
    {
        $this->fechaInicial = $fechaInicial;

        return $this;
    }

    /**
     * Get fechaInicial
     *
     * @return \DateTime
     */
    public function getFechaInicial()
    {
        return $this->fechaInicial;
    }

    /**
     * Set fechaFinal
     *
     * @param \DateTime $fechaFinal
     *
     * @return Pago
     */
    public function setFechaFinal($fechaFinal)
    {
        $this->fechaFinal = $fechaFinal;

        return $this;
    }

    /**
     * Get fechaFinal
     *
     * @return \DateTime
     */
    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    /**
     * Set efectivo
     *
     * @param float $efectivo
     *
     * @return Pago
     */
    public function setEfectivo($efectivo)
    {
        $this->efectivo = $efectivo;

        return $this;
    }

    /**
     * Get efectivo
     *
     * @return float
     */
    public function getEfectivo()
    {
        return $this->efectivo;
    }

    /**
     * Set artista
     *
     * @param \AppBundle\Entity\Artista $artista
     *
     * @return Pago
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
     * Add trabajo
     *
     * @param \AppBundle\Entity\Trabajo $trabajo
     *
     * @return Pago
     */
    public function addTrabajo(\AppBundle\Entity\Trabajo $trabajo)
    {
        $this->trabajos[] = $trabajo;

        return $this;
    }

    /**
     * Remove trabajo
     *
     * @param \AppBundle\Entity\Trabajo $trabajo
     */
    public function removeTrabajo(\AppBundle\Entity\Trabajo $trabajo)
    {
        $this->trabajos->removeElement($trabajo);
    }

    /**
     * Get trabajos
     *
     * @return Collection
     */
    public function getTrabajos()
    {
        return $this->trabajos;
    }
}
