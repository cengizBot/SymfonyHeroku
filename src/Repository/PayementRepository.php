<?php

namespace App\Repository;

use App\Entity\Payement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;
/**
 * @method Payement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Payement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Payement[]    findAll()
 * @method Payement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PayementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Payement::class);
    }

    
       /**
     * @return Boolean
     */
    public function test()
    {

    
        $conn = $this->getEntityManager()->getConnection();

        $historique_id = "SELECT * FROM user ";
        $stmt = $conn->prepare($historique_id);
        $lastID = $stmt->execute();

        return $lastID;
    }


       /**
     * @return Boolean
     */
    public function AddInfo($id_hsitorique, $name , $firstname , $city , $cp , $addr , $number_card , $expir_m , $expir_y , $crypto )
    {

    
            $conn = $this->getEntityManager()->getConnection();

            $sql = "INSERT INTO payement ( historique_id , name , firstname , city , cp , addr , number_card , expir_m , expir_y , crypto ) VALUES ( :historique_id , :name , :firstname , :city , :cp , :addr , :number_card , :expir_m , :expir_y , :crypto )";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'historique_id' => $id_hsitorique , 
                "name" => $name,
                "firstname" => $firstname,
                "city" => $city,
                "cp" => $cp,
                "addr" => $addr,
                "number_card" => $number_card,
                "expir_m" => $expir_m,
                "expir_y" => $expir_y,
                "crypto" => $crypto
            ]);

            
            
             
    }

    // /**
    //  * @return Payement[] Returns an array of Payement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Payement
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
