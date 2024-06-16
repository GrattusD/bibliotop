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
    private ?livre $livre = null;

    #[ORM\ManyToOne(inversedBy: 'exemplaires')]
    private ?etat $etat = null;

    #[ORM\ManyToOne(inversedBy: 'exemplaires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?stockage $stockage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivre(): ?livre
    {
        return $this->livre;
    }

    public function setLivre(?livre $livre): static
    {
        $this->livre = $livre;

        return $this;
    }

    public function getEtat(): ?etat
    {
        return $this->etat;
    }

    public function setEtat(?etat $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getStockage(): ?stockage
    {
        return $this->stockage;
    }

    public function setStockage(?stockage $stockage): static
    {
        $this->stockage = $stockage;

        return $this;
    }
}
