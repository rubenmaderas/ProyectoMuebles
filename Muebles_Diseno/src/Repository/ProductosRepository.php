<?php

namespace App\Repository;

use App\Entity\Productos;
use App\Entity\Categorias;
use App\Entity\Ofertas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Productos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Productos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Productos[]    findAll()
 * @method Productos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductosRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Productos::class);
    }

    public function listar($idCategoria){
        return $this->getEntityManager()
            ->createQuery(
                "SELECT p FROM App\Entity\Productos p WHERE p.categorias=$idCategoria"
            )
            ->getResult();
    }

    public function listarDescripcion($idProducto){
        return $this->getEntityManager()
            ->createQuery(
                "SELECT p FROM App\Entity\Productos p WHERE p.id=$idProducto"
            )
            ->getResult();
    }

    public function buscadorProductoRepository($buscarProducto){
        return $this->createQueryBuilder('p')
        ->join('p.categorias','c')
        ->where('p.nombre LIKE :nombrePr OR c.nombre LIKE :nombrePr')
        ->setParameter('nombrePr', '%'.$buscarProducto.'%')
        ->getQuery()
        ->execute();
    }
}
