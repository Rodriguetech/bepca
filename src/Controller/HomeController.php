<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {

        $notification = null;
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nom = $form['nom']->getData();
            $prenom = $form['prenom']->getData();
            $email = $form['email']->getData();
            $message = $form['message']->getData();



            $notification = "Thank you for contacting us. Our team will get back to you in the shortest time.";


            $mail = new Mail();
            $content = " Firstname and lastanme : " . $nom ." " .$prenom ."<br>" . " Client email address : " . $email ."<br>" . " Message  : " .$message ;
            $mail->send("info@bepca.comgi","Contact", 'Contact du client ', $content);

            //altra.bank9@gmail.com
            unset($entity);
            unset($form);

            $form = $this->createForm(ContactType::class);
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            "notification" => $notification
        ]);
    }
}
