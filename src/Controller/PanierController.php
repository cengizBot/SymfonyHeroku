<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{


    /**
     * @Route("/panier", name="panier")
     */
    public function index(Session $session)
    {

        $panier = new Product();
        $numbers_product = $panier->ManagerPanier($session);
        $panier = $session->get('panier');
     
        // cout totals de tous les articles
        $TTC = 0;

        if($panier != null){
            foreach ($panier as $value) {
            
                $TTC += $value['cost'];
    
            }        
        }else{
            $panier = 0;
        }
       
    
    
        return $this->render('panier/index.html.twig', [
            'controller_name' => 'PanierController',
            'panier' => $numbers_product,
            'user_panier' => $panier,
            'TTC' => $TTC
        ]);
    }

    /**
     * @Route("/added_product/{id}", name="added_product")
     */
    public function added_product(Session $session,Request $request){

        $id = $request->attributes->get('id');

        $product = new Product();
        //get array panier
        $array = $session->get('panier');

        //create new array panier
        $new_array = $product->AddedProduct($id,$array);


        $session->set('panier',$new_array);

        return $this->redirectToRoute('panier'); 

    }

     /**
     * @Route("/remove_product/{id}", name="remove_product")
     */
    public function remove_product(Session $session,Request $request){

        $id = $request->attributes->get('id');

        $product = new Product();
        //get array panier
        $array = $session->get('panier');

        //create new array panier
        $new_array = $product->RemoveProduct($id,$array);


        $session->set('panier',$new_array);

        return $this->redirectToRoute('panier'); 

    }

    
}
