<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Component\Routing\Attribute\Route;  
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController {


    #[Route('/', name: 'app_homepage')]
    public function homepage()
    {
        return $this->render('homepage.html.twig');
    }   

};