<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cliente
 *
 * @ORM\Table(name="Cliente")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClienteRepository")
 */
class Cliente
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
     * @var string
     *
     * @ORM\Column(name="Telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @ORM\OneToMany(targetEntity="Cita", mappedBy="cliente")
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
     * @return Cliente
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
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Cliente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Add cita
     *
     * @param \AppBundle\Entity\Cita $cita
     *
     * @return Cliente
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
