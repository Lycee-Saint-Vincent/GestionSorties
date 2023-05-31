<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupeRepository::class)]
class Groupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle_groupe = null;

    #[ORM\Column(length: 255)]
    private ?string $code_groupe = null;

    #[ORM\OneToMany(mappedBy: 'id_groupe', targetEntity: Eleve::class)]
    private Collection $eleve;

    public function __construct()
    {
        $this->eleve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleGroupe(): ?string
    {
        return $this->libelle_groupe;
    }

    public function setLibelleGroupe(string $libelle_groupe): self
    {
        $this->libelle_groupe = $libelle_groupe;

        return $this;
    }

    public function getCodeGroupe(): ?string
    {
        return $this->code_groupe;
    }

    public function setCodeGroupe(string $code_groupe): self
    {
        $this->code_groupe = $code_groupe;

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getEleve(): Collection
    {
        return $this->eleve;
    }

    public function addEleve(Eleve $eleve): self
    {
        if (!$this->eleve->contains($eleve)) {
            $this->eleve->add($eleve);
            $eleve->setIdGroupe($this);
        }

        return $this;
    }

    public function removeEleve(Eleve $eleve): self
    {
        if ($this->eleve->removeElement($eleve)) {
            // set the owning side to null (unless already changed)
            if ($eleve->getIdGroupe() === $this) {
                $eleve->setIdGroupe(null);
            }
        }

        return $this;
    }
}
