<?php

namespace App\Repository;

use App\Entity\Ofertas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ofertas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ofertas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ofertas[]    findAll()
 * @method Ofertas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfertasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ofertas::class);
    }

    // /**
    //  * @return Ofertas[] Returns an array of Ofertas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ofertas
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function listarofertas(){
        return $this->createQueryBuilder('o')
        ->join('o.productos','p')
        ->getQuery()
        ->execute();
    }

    public function listardetallesofertas($idProducto){
        return $this->getEntityManager()
        ->createQuery(
            "SELECT o FROM App\Entity\Ofertas o WHERE o.productos= $idProducto"
        )
        ->getResult();
    }

    public function listar(){
        return $this->getEntityManager()
            ->createQuery(
                "SELECT p FROM \App\Entity\Productos p JOIN \App\Entity\Ofertas o where p.id = o.productos"
            )
            ->getResult();
    }

    public function saberDescuentoOferta($id){
        return $this->getEntityManager()
            ->createQuery(
                "SELECT o FROM App\Entity\Ofertas o WHERE o.productos= $id"
            )
            ->getResult();
    }
}
