<?php

namespace App\Repository;

use App\Entity\Commentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Commentaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commentaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commentaire[]    findAll()
 * @method Commentaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commentaire::class);
    }

    /**
     * @return Commentaire[] Returns last commentaire insert
    */
    public function PostCommentaire($prod , $user , $name , $comment ){

        $date = date('Y-m-d H:i:s');

        $conn = $this->getEntityManager()->getConnection();

        $comment = htmlspecialchars($comment);

            $sql = "INSERT INTO commentaire (product_id , user_id , comment , date , name  ) VALUES ( :product_id , :user_id , :comment , :date , :name)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'product_id' => $prod , 
                "user_id" => $user,
                "name" => $name,
                "comment" => $comment,
                "date" => $date

            ]);
            
            return $id = $conn->lastInsertId();


    }

    // /**
    //  * @return Commentaire[] Returns an array of Commentaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Commentaire
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
