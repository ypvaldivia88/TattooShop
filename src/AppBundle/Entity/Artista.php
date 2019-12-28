<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Artista
 *
 * @ORM\Table(name="Artista")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtistaRepository")
 */
class Artista
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
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Cita", mappedBy="artista")
     */
    protected $citas;

    /**
     * @ORM\OneToMany(targetEntity="Trabajo", mappedBy="artista")
     */
    protected $trabajos;

    /**
     * @ORM\OneToMany(targetEntity="Pago", mappedBy="artista")
     */
    protected $pagos;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->citas = new ArrayCollection();
        $this->trabajos = new ArrayCollection();
        $this->pagos = new ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Artista
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add cita
     *
     * @param \AppBundle\Entity\Cita $cita
     *
     * @return Artista
     */
    public function addCita(\AppBundle\Entity\Cita $cita)
    {
        $this->citas[] = $cita;

        return $this;
    }

    /**
     * Remove cita
     *
     * @param \AppBundle\Entity\Cita $cita
     */
    public function removeCita(\AppBundle\Entity\Cita $cita)
    {
        $this->citas->removeElement($cita);
    }

    /**
     * Get citas
     *
     * @return Collection
     */
    public function getCitas()
    {
        return $this->citas;
    }

    /**
     * Add trabajo
     *
     * @param \AppBundle\Entity\Trabajo $trabajo
     *
     * @return Artista
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

    /**
     * Add pago
     *
     * @param \AppBundle\Entity\Pago $pago
     *
     * @return Artista
     */
    public function addPago(\AppBundle\Entity\Pago $pago)
    {
        $this->pagos[] = $pago;

        return $this;
    }

    /**
     * Remove pago
     *
     * @param \AppBundle\Entity\Pago $pago
     */
    public function removePago(\AppBundle\Entity\Pago $pago)
    {
        $this->pagos->removeElement($pago);
    }

    /**
     * Get pagos
     *
     * @return Collection
     */
    public function getPagos()
    {
        return $this->pagos;
    }
}
