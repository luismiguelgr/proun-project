<?php

namespace App\Repository;

use App\Entity\ServiceLocator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServiceLocator>
 *
 * @method ServiceLocator|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceLocator|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceLocator[]    findAll()
 * @method ServiceLocator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceLocatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceLocator::class);
    }

    public function addServiceLocator(ServiceLocator $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ServiceLocator $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

}
