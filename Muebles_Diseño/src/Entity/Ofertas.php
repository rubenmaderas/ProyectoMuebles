<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ofertas
 *
 * @ORM\Table(name="ofertas", indexes={@ORM\Index(name="fk_Ofertas_Productos1_idx", columns={"Productos_id"})})
 * @ORM\Entity
 */
class Ofertas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="descuento", type="float", precision=10, scale=0, nullable=false)
     */
    private $descuento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fInicioOferta", type="datetime", nullable=false)
     */
    private $finiciooferta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fFinOferta", type="datetime", nullable=false)
     */
    private $ffinoferta;

    /**
     * @var \Productos
     *
     * @ORM\ManyToOne(targetEntity="Productos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Productos_id", referencedColumnName="id")
     * })
     */
    private $productos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescuento(): ?float
    {
        return $this->descuento;
    }

    public function setDescuento(float $descuento): self
    {
        $this->descuento = $descuento;

        return $this;
    }

    public function getFiniciooferta(): ?\DateTimeInterface
    {
        return $this->finiciooferta;
    }

    public function setFiniciooferta(\DateTimeInterface $finiciooferta): self
    {
        $this->finiciooferta = $finiciooferta;

        return $this;
    }

    public function getFfinoferta(): ?\DateTimeInterface
    {
        return $this->ffinoferta;
    }

    public function setFfinoferta(\DateTimeInterface $ffinoferta): self
    {
        $this->ffinoferta = $ffinoferta;

        return $this;
    }

    public function getProductos(): ?Productos
    {
        return $this->productos;
    }

    public function setProductos(?Productos $productos): self
    {
        $this->productos = $productos;

        return $this;
    }


}
