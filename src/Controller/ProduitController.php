<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produit')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'produit_index')]
    public function index(): Response
    {
        $dsn = getenv('DATABASE_URL') ?: 'sqlite:'.$this->getParameter('kernel.project_dir').'/var/data.db';
        $pdo = new \PDO($dsn);
        $stmt = $pdo->query('SELECT p.libelle, p.prix, p.qteStock, c.libelle AS categorie
                              FROM produit p JOIN categorie c ON p.categorie_id=c.id');
        $produits = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->render('produit/index.html.twig', ['produits' => $produits]);
    }

    #[Route('/new', name: 'produit_new')]
    public function new(): Response
    {
        return new Response('Ajout de produit non implémenté.');
    }
}
