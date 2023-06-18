<?php

namespace App\DataFixtures;

use App\Entity\Cars;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture implements FixtureGroupInterface
{
    public static function getGroups(): array
    {
        return ['tutorial'];
    }
    public function load(ObjectManager $manager): void
    {
        $cars = [
            [
                'type' => 'Audi A1',
                'color' => 'blue',
                'price' => 35.99,
                'transmission' => 0,
                'location' => 'Berlin',
            ],
            [
                'type' => 'Audi A3',
                'color' => 'pink',
                'price' => 55.99,
                'transmission' => 2,
                'location' => 'Ingolstadt',
            ],
            [
                'type' => 'Audi RS4',
                'color' => 'gray',
                'price' => 98.99,
                'transmission' => 1,
                'location' => 'Hamburg',
            ],
            [
                'type' => 'BMW 1er',
                'color' => 'white',
                'price' => 65.99,
                'transmission' => 1,
                'location' => 'München',
            ],
            [
                'type' => 'BMW i3',
                'color' => 'brown metallic',
                'price' => 110.99,
                'transmission' => 0,
                'location' => 'München',
            ],
            [
                'type' => 'BMW Z1',
                'color' => 'red',
                'price' => 45.99,
                'transmission' => 0,
                'location' => 'Dresden',
            ],
            [
                'type' => 'Dacia Duster',
                'color' => 'orange',
                'price' => 65.99,
                'transmission' => 2,
                'location' => 'Düsseldorf',
            ],
            [
                'type' => 'Dacia Dokker',
                'color' => 'black',
                'price' => 23.99,
                'transmission' => 0,
                'location' => 'Duisburg',
            ],
            [
                'type' => 'Dacia 1300',
                'color' => 'green',
                'price' => 15.99,
                'transmission' => '0',
                'location' => 'Leipzig',
            ],
            [
                'type' => 'Lamborghini Gallardo',
                'color' => 'green',
                'price' => 500.99,
                'transmission' => 2,
                'location' => 'Stuttgart',
            ],
            [
                'type' => 'Lamborghini Urraco',
                'color' => 'orange',
                'price' => 450.99,
                'transmission' => 0,
                'location' => 'Calw',
            ],
            [
                'type' => 'Lamborghini Aventador',
                'color' => 'yellow',
                'price' => 899.99,
                'transmission' => 2,
                'location' => 'Karlsruhe',
            ],
        ];

        foreach($cars as $item) {
            $car = new Cars();
            $car->setType($item['type'])->setColor($item['color'])->setPrice($item['price'])->setTransmission($item['transmission'])->setLocation($item['location']);

            $manager->persist($car);
        }

        $manager->flush();
    }
}
