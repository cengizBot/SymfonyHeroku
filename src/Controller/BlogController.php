<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy;



class BlogController extends AbstractController
{
    // /**
    //  * @Route("/blog", name="blog")
    //  */
    // public function index()
    // {

    //     // $entityManager = $this->getDoctrine()->getManager();

    //     // $arrrayProduct = [

    //     //     [
    //     //         "name" => "imprimante",
    //     //         "price" => 200,
    //     //         "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.",
    //     //         "garantie" => false,
    //     //         "image" => "imprimante.jpg"

    //     //     ],

    //     //     [
    //     //         "name" => "iphone 10",
    //     //         "price" => 750,
    //     //         "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.",
    //     //         "garantie" => true,
    //     //         "image" => "ihpone.jpg"

    //     //     ],

    //     //     [
    //     //         "name" => "mac",
    //     //         "price" => 1200,
    //     //         "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.",
    //     //         "garantie" => true,
    //     //         "image" => "mac.jpg"

    //     //     ],

    //     //     [
    //     //         "name" => "ordinateur Samsung",
    //     //         "price" => 450,
    //     //         "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.",
    //     //         "garantie" => false,
    //     //         "image" => "ordinateur.jpg"

    //     //     ],

    //     //     [
    //     //         "name" => "trotinette",
    //     //         "price" => 150,
    //     //         "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.",
    //     //         "garantie" => true,
    //     //         "image" => "trotinette.jpg"

    //     //     ],
    //     //     [
    //     //         "name" => "Lave Linge",
    //     //         "price" => 450,
    //     //         "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Amet justo donec enim diam vulputate ut pharetra. Scelerisque purus semper eget duis at tellus at urna condimentum. Vitae et leo duis ut diam quam nulla porttitor. Lorem sed risus ultricies tristique nulla. Dignissim cras tincidunt lobortis feugiat vivamus at augue eget arcu. Consequat mauris nunc congue nisi vitae suscipit tellus mauris. Varius quam quisque id diam vel quam. Facilisis volutpat est velit egestas dui id. Lacinia quis vel eros donec. Eget gravida cum sociis natoque penatibus. Libero enim sed faucibus turpis in eu. Integer enim neque volutpat ac tincidunt vitae semper. Gravida rutrum quisque non tellus. Morbi quis commodo odio aenean sed adipiscing diam donec. Turpis massa tincidunt dui ut. Quis lectus nulla at volutpat diam ut venenatis. At risus viverra adipiscing at in tellus integer. Lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique. Ac felis donec et odio pellentesque.",
    //     //         "garantie" => false,
    //     //         "image" => "lavelinge.jpg"

    //     //     ]

    //     // ];

       
    //     // // dump(count($arrrayProduct));

    //     // for($i = 0; $i < count($arrrayProduct); $i ++){
    //     //     $product = new Product();
    //     //     $product->setName($arrrayProduct[$i]['name']);
    //     //     $product->setPrice($arrrayProduct[$i]['price']);
    //     //     $product->setDescription($arrrayProduct[$i]['description']);
    //     //     $product->setGarantie($arrrayProduct[$i]['garantie']);
    //     //     $product->setImage($arrrayProduct[$i]['image']);

    //     //     $entityManager->persist($product);
    //     //     $entityManager->flush();

    //     // }

    

    //     return $this->render('blog/blog.html.twig', [
    //         'controller_name' => 'Welcome blog',
    //     ]);
    // }


     /**
     * @Route("/", name="home")
     */
    public function home(Session $session){
      
        //test 
        //test
        $repo = $this->getDoctrine()->getRepository(Product::class);

        $product = $repo->findAll();

        $panier = new Product();
        $numbers_product = $panier->ManagerPanier($session);
    
        return $this->render('blog/home.html.twig', [
            'title' => 'Welcome Home',
            'products' => $product,
            'panier' => $numbers_product
        ]);



    }

    

}
