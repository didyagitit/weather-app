<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
* @Route("/api/forecast")
*/
class ForecastController extends Controller
{
    /**
     * @Route("/", name="forecast_index", methods={"GET"})
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ForecastController.php',
        ]);
    }
}
