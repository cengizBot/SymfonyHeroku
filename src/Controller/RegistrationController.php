<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Form\RegisterType;
use DateTime;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function registration(Request $request, ValidatorInterface $validator, Session $session, UserPasswordEncoderInterface $encoder)
    {

        $user = new User();

                
        // get all msg errors
        $arrayErrors = [];

        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

       

        if ($request->isMethod('POST')) {

            $errors = $validator->validate($user);

                
            // success form register
            if (count($errors) > 0) {

                    foreach ($errors as $violation) {
                    
                        array_push( $arrayErrors , 
                                [
                                    "input" => $violation->getPropertyPath() ,
                                    "msg" => $violation->getMessage() 
                                ]
                        );
                    }
                                
            }

            $task = $form->getData();


            //check if equal mdp
            $username = htmlspecialchars($task->getUsername());
            $name = htmlspecialchars($task->getName());
            $email = htmlspecialchars($task->getEmail());
            $pass = htmlspecialchars($task->getPassword());
            $samepass = htmlspecialchars($task->getSamePassword());

            if($pass != $samepass){
               
                array_push( $arrayErrors , 
                [
                    "input" => "Password" ,
                    "msg" => "Les mots de passe ne sont pas identiques"
                ]
                );
            }

            //check if email exist in DB
            $check = $this->getDoctrine()
                            ->getRepository(User::class)
                            ->findOneByEmail($email);
            
            if($check){
                array_push( $arrayErrors , 
                [
                    "input" => "email" ,
                    "msg" => "Email déjà enregistré"
                ]
                );
            }


            //form submit success
            //if not errors in array errors
            if(empty($arrayErrors)){
                if ($form->isSubmitted() && $form->isValid()) {
  
                    $date = date('Y-m-d H:i:s');
                    $startDate = new \DateTime($date);

                    $entityManager = $this->getDoctrine()->getManager();

                    $user = new User();
                    $user->setUsername($username);
                    $user->setName($name);
                    $user->setEmail($email);

                    $encoded = $encoder->encodePassword($user, $pass);
                    $user->setPassword($encoded);
                    $user->setDateCreate($startDate);

                    $entityManager->persist($user);

                    $entityManager->flush();

                    $this->addFlash('success', 'Inscription réussite');

                    return $this->redirectToRoute('registration');

                }
    
            }
           
           
        
        }

        
        function checkArray($arrayErrors){

            $new_array = [];
            $doublon = [];
            for($i = 0; $i < count($arrayErrors); $i ++){

                for($j = 0; $j < $i; $j ++){

                    if($arrayErrors[$i]['input'] === $arrayErrors[$j]['input']){

                        $k = $arrayErrors[$i] += [ "other" => $arrayErrors[$j]['msg'] ];

                        //doublon
                        $p = intval($i);
                        $r = intval($j);
                        array_push($doublon,$p);
                        array_push($doublon,$r);

                        array_push($new_array, $k );

                 
                    }
                }
            }


            // delete all doublon in array
            for($i = 0; $i < count($doublon); $i ++ ){

                 unset($arrayErrors[$doublon[$i]]);

            }


            // add all array in $arrayErrors to $new_array because (not doublon)
           foreach($arrayErrors  as $key => $value) {
                 array_push($new_array, $arrayErrors[$key] );
           }
            
            
           return $new_array;

        }

        $arrayErrors = checkArray($arrayErrors);
        $session->set('errors', $arrayErrors);
        
        
        $panier = new Product();
        $numbers_product = $panier->ManagerPanier($session);

        return $this->render('registration/registration.html.twig', [
            'form' => $form->createView(),
            'errors' => $session->get('errors'),
            'panier' => $numbers_product
        ]);

        

        



    }

}
