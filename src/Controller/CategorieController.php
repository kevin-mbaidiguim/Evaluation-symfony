<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie')]
class CategorieController extends AbstractController
{
    #[Route('/', name: 'categorie_index')]
    public function index(): Response
    {
        $dsn = getenv('DATABASE_URL') ?: 'sqlite:'.$this->getParameter('kernel.project_dir').'/var/data.db';
        $pdo = new \PDO($dsn);
        $stmt = $pdo->query('SELECT code, libelle FROM categorie');
        $categories = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->render('categorie/index.html.twig', ['categories' => $categories]);
    }

    #[Route('/new', name: 'categorie_new')]
    public function new(): Response
    {
        return new Response('Ajout de catégorie non implémenté.');
    }
}
