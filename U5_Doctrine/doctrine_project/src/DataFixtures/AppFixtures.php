<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Supplier;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Supplier();
        $product->setName('Nike');
        $product->setAddress('Portland, USA');

        $manager->persist($product);

        $product = new Supplier();
        $product->setName('Adidas');
        $product->setAddress('Germany');

        $manager->persist($product);

        $manager->flush();
    }
}
