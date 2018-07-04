<?php

namespace App\Repository;

use App\Entity\ArticleComments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ArticleComments|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleComments|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleComments[]    findAll()
 * @method ArticleComments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleCommentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ArticleComments::class);
    }

    public function findCommentByArticleId($id)
    {
        return $this->createQueryBuilder('a')
            ->select('a.comment, a.name, a.date')
            ->where('a.article = :id')
            ->andWhere('a.active = TRUE')
            ->setParameter('id', $id)
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return ArticleComments[] Returns an array of ArticleComments objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleComments
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
