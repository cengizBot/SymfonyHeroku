<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Entity\Historique;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     * @Route("/compte", name="compte")
     */
    public function index(Session $session)
    {
        $panier = new Product();
        $numbers_product = $panier->ManagerPanier($session);
        $user_id = $this->getUser()->getID();

        $arrayRef = [];

        $test =  $this->getDoctrine()->getRepository(Historique::class)
        ->test($user_id);

        // on récupère tous les ref d'id pour voir qu'elles sont les articles achetés ensembles

        foreach ($test as $key => $value) {
            array_push($arrayRef,$value['reference_id']);
        }

        $arrayRef = array_unique($arrayRef);
        
        $arrayRef = array_values($arrayRef);

        //final array post to template
        $newArray = [];



        for($i = 0; $i < count($arrayRef); $i ++){

            for($j = 0; $j < count($test); $j ++){

                if($arrayRef[$i] === $test[$j]['reference_id'] ){

                    $key = array_key_exists($arrayRef[$i], $newArray);

                    if($key){
                        // key exist post in array key

                        $number = count($newArray[$arrayRef[$i]]);
                        $test[$j]["date_buy"] = new \DateTime($test[$j]["date_buy"], new \DateTimeZone('Europe/Paris'));
                        $key = $test[$j];
                        array_push($newArray[$arrayRef[$i]],$key);

                    }else{
                        // key not exist post in array with create key
                        $test[$j]["date_buy"] = new \DateTime($test[$j]["date_buy"], new \DateTimeZone('Europe/Paris'));
                        $key =  [ $arrayRef[$i] => [  $test[$j] ] ];
                        $newArray +=  $key;
                    
                    }

                }

            }

        }
     


        return $this->render('compte/index.html.twig', [
            'panier' => $numbers_product,
            "commandes" =>$newArray
        ]);
    }
}
