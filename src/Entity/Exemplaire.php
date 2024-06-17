<?php

namespace App\Entity;

use App\Repository\ExemplaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExemplaireRepository::class)]
class Exemplaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Livre $livre = null;

    #[ORM\ManyToOne(inversedBy: 'exemplaires')]
    private ?Etat $etat = null;

    #[ORM\ManyToOne(inversedBy: 'exemplaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Stockage $stockage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
    return $this->getName();
    }

    public function getLivre(): ?Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): static
    {
        $this->Livre = $livre;

        return $this;
    }

    public function getEtat(): ?Etat
    {
        return $this->etat;
    }

    public function setEtat(?etat $etat): static
    {
        $this->Etat = $etat;

        return $this;
    }

    public function getStockage(): ?Stockage
    {
        return $this->Stockage;
    }

    public function setStockage(?Stockage $stockage): static
    {
        $this->Stockage = $stockage;

        return $this;
    }
}
