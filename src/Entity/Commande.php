<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Commande
{
    private ?int $id = null;

    private \DateTimeInterface $date;

    private float $montant;

    /**
     * @var Collection<int, Achat>
     */
    private Collection $achats;

    public function __construct()
    {
        $this->achats = new ArrayCollection();
        $this->date = new \DateTime();
        $this->montant = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getMontant(): float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;
        return $this;
    }

    /** @return Collection<int, Achat> */
    public function getAchats(): Collection
    {
        return $this->achats;
    }

    public function addAchat(Achat $achat): self
    {
        if (!$this->achats->contains($achat)) {
            $this->achats->add($achat);
            $achat->setCommande($this);
            $this->montant += $achat->getQteAchete() * $achat->getProduit()->getPrix();
        }
        return $this;
    }

    public function removeAchat(Achat $achat): self
    {
        if ($this->achats->removeElement($achat)) {
            if ($achat->getCommande() === $this) {
                $achat->setCommande(null);
                $this->montant -= $achat->getQteAchete() * $achat->getProduit()->getPrix();
            }
        }
        return $this;
    }

    public function __toString(): string
    {
        return sprintf('Commande #%d', $this->id);
    }
}
