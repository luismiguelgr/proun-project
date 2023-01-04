<?php

namespace App\Repository;

use App\Entity\Trip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method Trip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trip[]    findAll()
 * @method Trip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TripRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trip::class);
    }

    public function addTrip(Trip $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Trip $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function update(Trip $entity): Trip
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        return $entity;
    }

    public function allTrips(): array
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.pickupPoint', 'pickup_point')
            ->addSelect('pickup_point')
            ->leftJoin('t.destinationPoint', 'destination_point')
            ->addSelect('destination_point')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    public function getTripByUuid(string $uuid): ?array
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.pickupPoint', 'pickup_point')
            ->addSelect('pickup_point')
            ->leftJoin('t.destinationPoint', 'destination_point')
            ->addSelect('destination_point')
            ->where('t.id = :id')
            ->setParameter('id', $uuid)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    public function getTripByField(string $id, string $field): ?array
    {
        return $this->createQueryBuilder('t')
            ->leftJoin('t.pickupPoint', 'pickup_point')
            ->addSelect('pickup_point')
            ->leftJoin('t.destinationPoint', 'destination_point')
            ->addSelect('destination_point')
            ->where('t.'.$field. '= :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
