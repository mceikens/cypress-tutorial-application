<?php

namespace App\Controller\Cars;

use App\Repository\CarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private CarsRepository $carsRepository;

    public function __construct(CarsRepository $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function __invoke(): Response
    {
        $cars = $this->carsRepository->findAll();
        return $this->render('/cars/list.html.twig',['cars' => $cars]);
    }
}