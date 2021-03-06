<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TipoTrabajo
 *
 * @ORM\Table(name="TipoTrabajo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipoTrabajoRepository")
 */
class TipoTrabajo
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
     * @ORM\OneToMany(targetEntity="Cita", mappedBy="tipo_trabajo")
     */
    protected $citas;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->citas = new ArrayCollection();
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
     * @return TipoTrabajo
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
     * @return TipoTrabajo
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
}
