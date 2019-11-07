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

    public function construct()
    {
        $this->$citas = new ArrayCollection();
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
     * @return TipoTrabajo
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
}
