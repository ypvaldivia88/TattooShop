<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trabajo
 *
 * @ORM\Table(name="Trabajo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TrabajoRepository")
 */
class Trabajo
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
     * @ORM\Column(name="Precio", type="float")
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="Descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Cita", inversedBy="trabajos")
     * @ORM\JoinColumn(name="cita_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $cita;

    /**
     * @ORM\ManyToOne(targetEntity="Artista", inversedBy="trabajos")
     * @ORM\JoinColumn(name="artista_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $artista;

    /**
     * @ORM\ManyToOne(targetEntity="Pago", inversedBy="trabajos")
     * @ORM\JoinColumn(name="pago_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $pago;

    /**
     * @var int
     *
     * @ORM\Column(name="PagoId", type="integer")
     */
    private $pagoId;

    /**
     * @var int
     *
     * @ORM\Column(name="ArtistaId", type="integer")
     */
    private $artistaId;


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
     * @return Trabajo
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
     * Set precio
     *
     * @param float $precio
     * @return Trabajo
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Trabajo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set citaId
     *
     * @param integer $citaId
     * @return Trabajo
     */
    public function setCitaId($citaId)
    {
        $this->citaId = $citaId;

        return $this;
    }

    /**
     * Get citaId
     *
     * @return integer 
     */
    public function getCitaId()
    {
        return $this->citaId;
    }

    /**
     * Set pagoId
     *
     * @param integer $pagoId
     * @return Trabajo
     */
    public function setPagoId($pagoId)
    {
        $this->pagoId = $pagoId;

        return $this;
    }

    /**
     * Get pagoId
     *
     * @return integer 
     */
    public function getPagoId()
    {
        return $this->pagoId;
    }

    /**
     * Set artistaId
     *
     * @param integer $artistaId
     * @return Trabajo
     */
    public function setArtistaId($artistaId)
    {
        $this->artistaId = $artistaId;

        return $this;
    }

    /**
     * Get artistaId
     *
     * @return integer 
     */
    public function getArtistaId()
    {
        return $this->artistaId;
    }

    /**
     * Set cita
     *
     * @param \AppBundle\Entity\Cita $cita
     * @return Trabajo
     */
    public function setCita(\AppBundle\Entity\Cita $cita = null)
    {
        $this->cita = $cita;

        return $this;
    }

    /**
     * Get cita
     *
     * @return \AppBundle\Entity\Cita 
     */
    public function getCita()
    {
        return $this->cita;
    }

    /**
     * Set artista
     *
     * @param \AppBundle\Entity\Artista $artista
     * @return Trabajo
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
     * Set pago
     *
     * @param \AppBundle\Entity\Pago $pago
     * @return Trabajo
     */
    public function setPago(\AppBundle\Entity\Pago $pago = null)
    {
        $this->pago = $pago;

        return $this;
    }

    /**
     * Get pago
     *
     * @return \AppBundle\Entity\Pago 
     */
    public function getPago()
    {
        return $this->pago;
    }
}
