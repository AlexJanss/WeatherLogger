<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WeatherLoggerController extends AbstractController
{
    /**
     * @Route("/weather/logger", name="weather_logger")
     */
    public function index()
    {
        return $this->render('weather_logger/index.html.twig', [
            'controller_name' => 'WeatherLoggerController',
        ]);
    }
}
