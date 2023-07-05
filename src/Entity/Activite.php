<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]
class Activite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_activite = null;

    #[ORM\Column]
    private ?float $cout_activte = null;

    #[ORM\Column(length: 255)]
    private ?string $commentaire_activite = null;

    #[ORM\Column]
    private ?float $adage_activite = null;

    #[ORM\ManyToOne(inversedBy: 'activite_projet')]
    private ?projet $projet_activite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomActivite(): ?string
    {
        return $this->nom_activite;
    }

    public function setNomActivite(string $nom_activite): self
    {
        $this->nom_activite = $nom_activite;

        return $this;
    }

    public function getCoutActivte(): ?float
    {
        return $this->cout_activte;
    }

    public function setCoutActivte(float $cout_activte): self
    {
        $this->cout_activte = $cout_activte;

        return $this;
    }

    public function getCommentaireActivite(): ?string
    {
        return $this->commentaire_activite;
    }

    public function setCommentaireActivite(string $commentaire_activite): self
    {
        $this->commentaire_activite = $commentaire_activite;

        return $this;
    }

    public function getAdageActivite(): ?float
    {
        return $this->adage_activite;
    }

    public function setAdageActivite(float $adage_activite): self
    {
        $this->adage_activite = $adage_activite;

        return $this;
    }

    public function getProjetActivite(): ?projet
    {
        return $this->projet_activite;
    }

    public function setProjetActivite(?projet $projet_activite): self
    {
        $this->projet_activite = $projet_activite;

        return $this;
    }
}
