<?php

namespace App\Repository;

use App\Entity\Historique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Serializer;

use function PHPSTORM_META\type;

/**
 * @method Historique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Historique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Historique[]    findAll()
 * @method Historique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Historique::class);
    }


    public function addHistorique($product_id , $user_id , $number_article , $couts_totaux , $ref , $ttc)
    {

            $date = date('Y-m-d H:i:s');
            

            $conn = $this->getEntityManager()->getConnection();

            $sql = "INSERT INTO historique (product_id , user_id , number_article , couts_totaux , reference_id, ttc , date_buy  ) VALUES ( :product_id , :user_id , :number_article , :couts_totaux , :reference_id, :ttc , :date_buy)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'product_id' => $product_id , 
                "user_id" => $user_id,
                "number_article" => $number_article,
                "couts_totaux" => $couts_totaux,
                "reference_id" => $ref,
                "ttc" => $ttc,
                "date_buy" => $date

            ]);
            
            return $id = $conn->lastInsertId();;
    }

    public function test($user_id){


        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT * FROM historique,payement,product WHERE historique.user_id = :user_id AND historique.id = payement.historique_id AND historique.product_id = product.id  ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id
        ]);
        
        $result = $stmt->fetchAll();

        return $result;

    }



    // /**
    //  * @return Historique[] Returns an array of Historique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Historique
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
