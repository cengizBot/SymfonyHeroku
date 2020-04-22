<?php

namespace App\Repository;

use App\Entity\LikeProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * @method LikeProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method LikeProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method LikeProduct[]    findAll()
 * @method LikeProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LikeProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LikeProduct::class);
    }

      /**
     * @return Product[]
     */
    public function findByExampleField($id_prod,$id_user)
    {
       
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\LikeProduct p
            WHERE p.productLike = :id_prod
            AND p.userId = :id_user'
        )->setParameter('id_prod',$id_prod)
        ->setParameter('id_user',$id_user);
      
        // returns an array of Product objects
        return $query->getResult();
    }

    /**
     * @return Product[]
     */
    public function likeProduct($id_prod,$id_user)
    {

        $id_user = intval($id_user);
        $id_prod = intval($id_prod);

        $check = $this->findByExampleField($id_prod,$id_user);

        if(!$check){
            
            $conn = $this->getEntityManager()->getConnection();

            $stmt = $conn->prepare("SELECT * FROM like_product");
            // $stmt = $conn->prepare("INSERT INTO like (user_id, product_id) VALUES (?, ?)");
            // $stmt->bindParam(1, $name);
            // $stmt->bindParam(2, $value);

            // $name = 8;
            // $value = 1;

            $stmt->execute();

            // $sql = "INSERT INTO like (user_id , product_id) VALUES (8,5)";
            // $stmt = $conn->prepare($sql);
            // $stmt->execute();

            return $stmt->fetchAll();

        }


        return false;   
    }

    // /**
    //  * @return LikeProduct[] Returns an array of LikeProduct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LikeProduct
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
