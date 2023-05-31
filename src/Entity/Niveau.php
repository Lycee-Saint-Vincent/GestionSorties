<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NiveauRepository::class)]
class Niveau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle_niveau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleNiveau(): ?string
    {
        return $this->libelle_niveau;
    }

    public function setLibelleNiveau(string $libelle_niveau): self
    {
        $this->libelle_niveau = $libelle_niveau;

        return $this;
    }
}
