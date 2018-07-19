<?php

namespace App\Controller\Api;

use App\Repository\CityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
* @Route("/api/city")
*/
class CityController extends Controller
{
    /**
    * @var CityRepository
    */
    private $cityRepository;

    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @Route("/", name="city_index", methods={"GET"})
     */
    public function index(Request $request)
    {
        $cities = $this->cityRepository->findAll();
        return $this->json([
          'cities' => $cities
        ]);
    }
}
