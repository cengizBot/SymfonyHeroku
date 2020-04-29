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

        foreach ($test as $key => $value) {
            // dump($test);
        }


        $arrayRef = array_unique($arrayRef);
        
        $arrayRef = array_values($arrayRef);

        //final array post to template
        $newArray = [];
        dump($test);

        for($i = 0; $i < count($arrayRef); $i ++){

            for($j = 0; $j < count($test); $j ++){

                if($arrayRef[$i] === $test[$j]['reference_id'] ){

                    $key = array_key_exists($arrayRef[$i], $newArray);

                    if($key){
                        // key exist post in array key

                        $number = count($newArray[$arrayRef[$i]]);
                        $key =  [ "commande$number" => [ $test[$j] ] ];
                        $newArray[$arrayRef[$i]] +=  $key;

                    }else{
                        // key not exist post in array with create key
                        $key =  [ $arrayRef[$i] => [ "commande" => [ "0" => $test[$j] ] ] ];
                        $newArray +=  $key;
                    }

                }

            }

        }
        dump($newArray);

        die();


        return $this->render('compte/index.html.twig', [
            'panier' => $numbers_product
        ]);
    }
}
