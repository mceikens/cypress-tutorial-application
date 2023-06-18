<?php

namespace App\Controller\Cars;

use App\Entity\Cars;
use App\Repository\CarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DeleteController extends AbstractController
{

    private CarsRepository $carsRepository;
    public function __construct(CarsRepository $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function __invoke(int $id): RedirectResponse
    {
        $car = $this->carsRepository->findOneBy(['id' => $id]);
        if ($car instanceof Cars === false) {
            $this->addFlash('danger', 'Sorry we cant find a car to given id');
            return $this->redirectToRoute('app_cars_index');
        }

        $this->carsRepository->remove($car, true);
        return $this->redirectToRoute('app_cars_index');
    }
}