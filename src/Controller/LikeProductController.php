<?php

namespace App\Controller;

use App\Entity\LikeProduct;
use App\Repository\LikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class LikeProductController extends AbstractController
{
   /**
     * @Route("/like", name="like")
     */
    public function index(Request $request, Session $session, EntityManagerInterface $em)
    {

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
            $id_prod = $session->get('product');

            $userId = $this->getUser()->getId();

            $products = $this->getDoctrine()->getRepository(LikeProduct::class)
            ->findByExampleField($id_prod,$userId);

        
            
            return $this->json(['code' => 200 , 'product_id' => $products]);
        }

        if($session->get('product') != null){
            return $this->redirectToRoute('product',['id' => $session->get('product') ]);
        }

        return $this->redirectToRoute('home');

       

    }


     /**
     * @Route("/likeproduct/{id}", name="likeproduct")
     */
    public function likeproduct(Request $request, Session $session, EntityManagerInterface $em)
    {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
            
            $id_prod = $session->get('product');
                       
            $userId = $this->getUser()->getId();

            $products = $this->getDoctrine()->getRepository(LikeProduct::class)
            ->likeProduct($id_prod,$userId);

        
            return $this->json(['code' => 200 , 'product_id' => $products]);

        }

        if($session->get('product') != null){
            return $this->redirectToRoute('product',['id' => $session->get('product') ]);
        }

        return $this->redirectToRoute('home');
    }

    /**
    * @Route("/unlikeproduct/{id}", name="dislelikeproduct")
    */
    public function dislelikeproduct(Request $request, Session $session, EntityManagerInterface $em)
    {

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
           
            $id_prod = $session->get('product');
                   
            $userId = $this->getUser()->getId();

            $products = $this->getDoctrine()->getRepository(LikeProduct::class)
            ->unlikeProduct($id_prod,$userId);

        
            return $this->json(['code' => 200 , 'product_id' => $products]);
        }

        if($session->get('product') != null){
            return $this->redirectToRoute('product',['id' => $session->get('product') ]);
        }

        return $this->redirectToRoute('home');;

    }
}
