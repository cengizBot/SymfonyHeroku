<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\LikeProduct;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function index(Request $request, Session $session)
    {

        

        //ici on va forcer l'id reçu à être un int , si l'id reçu est sous format ex : 14dazdzad on va récuprer que les int de l'id
        
        $get = $request->attributes->get('id');

        $id = intval(preg_replace('/[^0-9]+/', '', $get), 10);

        $product = $this->getDoctrine()
                    ->getRepository(Product::class)
                    ->find($id);

        $panier = new Product();
        $numbers_product = $panier->ManagerPanier($session);


        // 404 not product found
        if(!$product){
            return $this->render('product/404.html.twig', [ 'panier' => $session->get('count_panier')
            ]);
        }

        
        $session->set('product', $id);
   

        //get the number of like product
        $like =  $this->getDoctrine()->getRepository(LikeProduct::class)
        ->CountLike($session->get('product'));

        $likes = implode("",$like);


        //get the commentaire of product
        $repository = $this->getDoctrine()->getRepository(Commentaire::class);

        $commentaires = $repository->findByProduct($id);

        


        // if found product render page index
        return $this->render('product/index.html.twig', [
            'product' => $product,
            'panier' => $numbers_product,
            'like' => $likes,
            'commentaires' => $commentaires
        ]);
    }

     /**
     * @Route("/addPanier/{id}", name="add")
     */
    public function AddPanier(Request $request , Session $session){

        
        
         $product = $request->attributes->get('id');

         $id = intval(preg_replace('/[^0-9]+/', '', $product), 10);

         $id = htmlentities($id);

         $product = $this->getDoctrine()
                    ->getRepository(Product::class)
                    ->find($id);


        // add failed not product found
        if(!$product){
            return $this->redirectToRoute('home');  
        }     

        $array_panier = [];

        if($session->get('panier') != null){

            $array_panier = $session->get('panier');

            $count = count($array_panier);

            for($i = 0; $i < $count; $i ++){
    

                //if product is in array
                if($array_panier[$i]['id'] === $product->getId()){

                    $array_panier[$i]['count'] =   $array_panier[$i]['count'] + 1;
                    $array_panier[$i]['cost'] =   $array_panier[$i]['count'] * $array_panier[$i]['price'];

                    $session->set('panier',$array_panier);
                    // dump("Existe deja");
                    // dump($session->get('panier'));
                    // die();

                    return $this->redirectToRoute('product',['id' => $product->getId()]);
                }
      
    
            }

            
                //if product is not in array
                array_push($array_panier,[
                    "id" => $product->getId(),
                    "name" => $product->getName(),
                     "img" => $product->getImage(),
                    "price" => $product->getPrice(),
                    "cost" => $product->getPrice() * 1,
                    "count" => 1
                ]);                

                $session->set('panier',$array_panier);  
                // dump("Nouveau produit");
                // dump($session->get('panier'));
                // die();
                
                return $this->redirectToRoute('product',['id' => $product->getId()]);         
        
        }else{
            
            // if session panier = null 
            // first add product in panier

            array_push($array_panier,[
                "id" => $product->getId(),
                "name" => $product->getName(),
                "price" => $product->getPrice(),
                "img" => $product->getImage(),
                "cost" => $product->getPrice() * 1,
                "count" => 1
            ]);

            $session->set('panier',$array_panier);
        }       
       
    
        return $this->redirectToRoute('product',['id' => $product->getId()]);     
    }
    

  
     /**
     * @Route("/searchProduct", name="searchProduct")
     */
    public function SearchProduct(Request $request , Session $session){
        //search product

        //string in search bar
        $product = $request->request->get('search_p');
        $product = htmlentities($product);
        
        $results =  $this->getDoctrine()->getRepository(Product::class)
        ->SearchProduct($product);
        


        return $this->json(['code' => 200, 'product' => $results]);

    }

}
