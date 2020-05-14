<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CommentaireController extends AbstractController
{
    /**
     * @Route("/commentaire", name="commentaire")
     */
    public function index(Request $request, Session $session)
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
          
                $comment = $request->request->get('comment');
                $user = $this->getUser()->getId();
                $name = $this->getUser()->getName();
                $prod = $session->get('product');
                $date = date('d/m/y à H:i');

                $data = [
                    "name" => $name,
                    "comment" => $comment,
                    "date" => $date
                ];

                $commentaire = $this->getDoctrine()->getRepository(Commentaire::class)
                ->PostCommentaire($prod , $user , $name , $comment);

                if($commentaire){
                    return $this->json(['code' => 200  , 'data' => $data ]);
                }

        }else{

            return $this->redirectToRoute('home');
        }
    }
}
