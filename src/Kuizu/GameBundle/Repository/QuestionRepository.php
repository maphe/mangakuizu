<?php

namespace Kuizu\GameBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Kuizu\GameBundle\Entity\Manga;
use Kuizu\UserBundle\Entity\User;

/**
 * QuestionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuestionRepository extends EntityRepository
{
    public function countByManga(Manga $manga = null)
    {
        $qb = $this->createQueryBuilder('q')
            ->select('count(q.id)');

        if (null !== $manga) {
            $qb
                ->where('q.manga = :mid')
                ->setParameter('mid', $manga->getId());
        }

        $count = $qb
            ->getQuery()
            ->getSingleScalarResult();

        return (int) $count;
    }

    public function findOneRandomlyByManga(Manga $manga = null, array $excludedIds = [])
    {
        $count = $this->countByManga($manga) - count($excludedIds);

        $qb = $this->createQueryBuilder('q');

        if (null !== $manga) {
            $qb
                ->where('q.manga = :mid')
                ->setParameter('mid', $manga->getId());
        }

        if ($excludedIds) {
            $qb
                ->andWhere('q.id NOT IN (:excludedIds)')
                ->setParameter('excludedIds', $excludedIds);
        }

        return $qb
            ->setFirstResult(rand(0, $count-1))
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
