<?php

namespace App\Controller\Cars;

use App\Entity\Cars;
use App\Form\CarType;
use App\Repository\CarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewController extends AbstractController
{
    private CarsRepository $carsRepository;

    public function __construct(CarsRepository $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function __invoke(Request $request): RedirectResponse|Response
    {
        $car = new Cars();
        $form = $this->createForm(CarType::class, $car)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->carsRepository->save($car, true);

            $this->addFlash('success', 'Your car was created.');
            return $this->redirectToRoute('app_cars_detail', ['id' => $car->getId()]);
        }

        return $this->render('/cars/new.html.twig', ['form' => $form]);
    }
}