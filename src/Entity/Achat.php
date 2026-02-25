<?php

namespace App\Entity;

class Achat
{
    private ?int $id = null;

    private int $qteAchete;

    private ?Produit $produit = null;

    private ?Commande $commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteAchete(): int
    {
        return $this->qteAchete;
    }

    public function setQteAchete(int $qteAchete): self
    {
        $this->qteAchete = $qteAchete;
        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;
        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf('%s x %d', $this->produit, $this->qteAchete);
    }
}
