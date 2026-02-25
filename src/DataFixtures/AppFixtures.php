<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // créer quelques catégories
        $c1 = new Categorie();
        $c1->setCode('ELEC')->setLibelle('Électronique');
        $manager->persist($c1);

        $c2 = new Categorie();
        $c2->setCode('ALIM')->setLibelle('Alimentation');
        $manager->persist($c2);

        // produits
        $p1 = new Produit();
        $p1->setLibelle('Télévision')->setPrix(499.99)->setQteStock(10)->setCategorie($c1);
        $manager->persist($p1);

        $p2 = new Produit();
        $p2->setLibelle('Ordinateur portable')->setPrix(899.99)->setQteStock(5)->setCategorie($c1);
        $manager->persist($p2);

        $p3 = new Produit();
        $p3->setLibelle('Pain')->setPrix(1.20)->setQteStock(100)->setCategorie($c2);
        $manager->persist($p3);

        $manager->flush();
    }
}
