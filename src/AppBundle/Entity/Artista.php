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

    public function construct()
    {
        $this->$citas = new ArrayCollection();
        $this->$trabajos = new ArrayCollection();
        $this->$pagos = new ArrayCollection();
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
     * Constructor
     */
    public function __construct()
    {
        $this->citas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add citas
     *
     * @param \AppBundle\Entity\Cita $citas
     * @return Artista
     */
    public function addCita(\AppBundle\Entity\Cita $citas)
    {
        $this->citas[] = $citas;

        return $this;
    }

    /**
     * Remove citas
     *
     * @param \AppBundle\Entity\Cita $citas
     */
    public function removeCita(\AppBundle\Entity\Cita $citas)
    {
        $this->citas->removeElement($citas);
    }

    /**
     * Get citas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCitas()
    {
        return $this->citas;
    }

    /**
     * Add trabajos
     *
     * @param \AppBundle\Entity\Trabajo $trabajos
     * @return Artista
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

    /**
     * Add pagos
     *
     * @param \AppBundle\Entity\Pago $pagos
     * @return Artista
     */
    public function addPago(\AppBundle\Entity\Pago $pagos)
    {
        $this->pagos[] = $pagos;

        return $this;
    }

    /**
     * Remove pagos
     *
     * @param \AppBundle\Entity\Pago $pagos
     */
    public function removePago(\AppBundle\Entity\Pago $pagos)
    {
        $this->pagos->removeElement($pagos);
    }

    /**
     * Get pagos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPagos()
    {
        return $this->pagos;
    }
}
