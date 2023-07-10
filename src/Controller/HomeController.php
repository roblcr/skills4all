<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $client = HttpClient::create();
        $apiKey = 'bbc4e88a3d1f8ecbdfadb757078c040e';
        $city = 'Paris';

        $response = $client->request('GET', "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric&lang=fr");
        $data = $response->toArray();

        return $this->render('home/index.html.twig', [
            'weatherData' => $data,
        ]);
    }
}
