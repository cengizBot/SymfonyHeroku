<?php

namespace App\Controller;

use App\Entity\Historique;
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

        if ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
        {
                
            // repete la requete celon le nbt d'article
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
    
            for($i = 0; $i < $count; $i ++){

                $historique = $this->getDoctrine()->getRepository(Historique::class)
                ->addHistorique($paniers[$i]['id'] , $user , $paniers[$i]['count'] , $paniers[$i]['cost'] , $bytes , $TTC );


            }

            $session->set('panier',null);
        
            return $this->json(['encode' => $historique]);
        }

        return $this->redirectToRoute('panier');

    }


}
