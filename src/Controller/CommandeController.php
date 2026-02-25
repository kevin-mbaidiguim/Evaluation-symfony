<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commande')]
class CommandeController extends AbstractController
{
    #[Route('/', name: 'commande_index')]
    public function index(): Response
    {
        $dsn = getenv('DATABASE_URL') ?: 'sqlite:'.$this->getParameter('kernel.project_dir').'/var/data.db';
        $pdo = new \PDO($dsn);
        $stmt = $pdo->query('SELECT id, date, montant FROM commande');
        $commandes = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->render('commande/index.html.twig', ['commandes' => $commandes]);
    }

    #[Route('/new', name: 'commande_new')]
    public function new(): Response
    {
        return new Response('Création de commande non implémenté.');
    }
}
