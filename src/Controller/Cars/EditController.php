<?php

namespace App\Controller\Cars;

use App\Entity\Cars;
use App\Form\CarType;
use App\Repository\CarsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditController extends AbstractController
{
    private CarsRepository $carsRepository;

    public function __construct(CarsRepository $carsRepository)
    {
        $this->carsRepository = $carsRepository;
    }

    public function __invoke(Request $request, int $id): RedirectResponse|Response
    {
        $car = $this->carsRepository->findOneBy(['id' => $id]);
        if ($car instanceof Cars === false) {
            $this->addFlash('danger', 'Sorry we cant find a car to given id');
            return $this->redirectToRoute('app_cars_index');
        }

        $form = $this->createForm(CarType::class, $car)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->carsRepository->save($car, true);


            $this->addFlash('success', 'Your car was updated.');
            return $this->redirectToRoute('app_cars_detail', ['id' => $car->getId()]);
        }

        return $this->render('/cars/edit.html.twig', ['form' => $form]);
    }
}