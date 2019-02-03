<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Productos
 *
 * @ORM\Table(name="productos", indexes={@ORM\Index(name="fk_Productos_Categorias1_idx", columns={"Categorias_id"})})
 * @ORM\Entity
 */
class Productos
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=0, nullable=false)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="dimensiones", type="string", length=45, nullable=false)
     */
    private $dimensiones;

    /**
     * @var string
     *
     * @ORM\Column(name="pathImagen", type="string", length=200, nullable=false)
     */
    private $pathimagen;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer", nullable=false)
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    /**
     * @var \Categorias
     *
     * @ORM\ManyToOne(targetEntity="Categorias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Categorias_id", referencedColumnName="id")
     * })
     */
    private $categorias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Materiales", inversedBy="productos")
     * @ORM\JoinTable(name="productos_has_materiales",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Productos_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Materiales_id", referencedColumnName="id")
     *   }
     * )
     */
    private $materiales;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materiales = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getDimensiones(): ?string
    {
        return $this->dimensiones;
    }

    public function setDimensiones(string $dimensiones): self
    {
        $this->dimensiones = $dimensiones;

        return $this;
    }

    public function getPathimagen(): ?string
    {
        return $this->pathimagen;
    }

    public function setPathimagen(string $pathimagen): self
    {
        $this->pathimagen = $pathimagen;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getCategorias(): ?Categorias
    {
        return $this->categorias;
    }

    public function setCategorias(?Categorias $categorias): self
    {
        $this->categorias = $categorias;

        return $this;
    }

    /**
     * @return Collection|Materiales[]
     */
    public function getMateriales(): Collection
    {
        return $this->materiales;
    }

    public function addMateriale(Materiales $materiale): self
    {
        if (!$this->materiales->contains($materiale)) {
            $this->materiales[] = $materiale;
        }

        return $this;
    }

    public function removeMateriale(Materiales $materiale): self
    {
        if ($this->materiales->contains($materiale)) {
            $this->materiales->removeElement($materiale);
        }

        return $this;
    }

    public function __toString(){
        return $this->nombre;
    }
}
