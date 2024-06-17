<?php

namespace App\Entity;

use App\Repository\EmpruntRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpruntRepository::class)]
class Emprunt
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'emprunts')]
    private ?Adherent $adherent = null;

    #[ORM\ManyToOne]
    private ?Exemplaire $exemplaire = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_emprunt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_retour = null;

    #[ORM\Column]
    private ?bool $statut = null;

    public function __toString()
    {
    return $this->getId().' '.$this->getExemplaire();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdherent(): ?adherent
    {
        return $this->adherent;
    }

    public function setAdherent(?adherent $adherent): static
    {
        $this->adherent = $adherent;

        return $this;
    }

    public function getExemplaire(): ?exemplaire
    {
        return $this->exemplaire;
    }

    public function setExemplaire(?exemplaire $exemplaire): static
    {
        $this->exemplaire = $exemplaire;

        return $this;
    }

    public function getDateEmprunt(): ?\DateTimeInterface
    {
        return $this->date_emprunt;
    }

    public function setDateEmprunt(\DateTimeInterface $date_emprunt): static
    {
        $this->date_emprunt = $date_emprunt;

        return $this;
    }

    public function getDateRetour(): ?\DateTimeInterface
    {
        return $this->date_retour;
    }



    public function setDateRetour(?\DateTimeInterface $date_retour): static
    {
        $this->date_retour = $date_retour;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }
    
    public function setDateLimite(): self
    {
        $dateLimite = DateTime::createFromInterface($this->getDateEmprunt());
        $dateLimite ->modify('+15days');
        $this->setdateLimite($dateLimite);
        return $this;
    }
    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->dateLimite;
    }
}

