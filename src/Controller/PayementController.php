<?php

namespace App\Controller;

use App\Entity\Historique;
use App\Entity\Payement;
use App\Entity\User;
use App\Repository\HistoriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class PayementController extends AbstractController
{
    /**
     * @Route("/payement", name="payement")
     */
    public function index(Request $request, Session $session)
    {


        $name = htmlentities($request->request->get('name'));
        $firstname =  htmlentities($request->request->get('firstname'));
        $city =  htmlentities($request->request->get('city'));
        $cp =  htmlentities($request->request->get('cp'));
        $addr =  htmlentities($request->request->get('addr'));

        $number_carde =  htmlentities($request->request->get('number_code'));
        $expirM =  htmlentities($request->request->get('expire_m'));
        $expirY =  htmlentities($request->request->get('expire_y'));

        $crypto =  htmlentities($request->request->get('crypto'));

        $csrf = $request->request->get('_csrf_token');

    
        if ($this->isCsrfTokenValid('payement',  $csrf )) {
            
               
        if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
        {
                
               // repete la requete selon le nbr d'article
                if($session->get('panier') === null){
                    return $this->redirectToRoute('home');
                }

                $count = count($session->get('panier'));

                $paniers = $session->get('panier');
                $TTC = $session->get('TTC');
                $user = $this->getUser()->getId();
                
                //represente reference
                $bytes = random_bytes(8);
                $bytes = bin2hex($bytes);
        
                // request add product buying
                for($i = 0; $i < $count; $i ++){

                    $historique = $this->getDoctrine()->getRepository(Historique::class)
                    ->addHistorique($paniers[$i]['id'] , $user , $paniers[$i]['count'] , $paniers[$i]['cost'] , $bytes , $TTC );
                    

                    // request add info payement user
                    $payementinfo = $this->getDoctrine()->getRepository(Payement::class)
                    ->AddInfo( $historique, $name , $firstname , $city , $cp , $addr , $number_carde , $expirM, $expirY, $crypto );

                }

                $session->set('panier',null);
            
                return $this->json(['buy' => true ]);
        }


        }

     
        return $this->json(['buy' => false ]);

    }


}
