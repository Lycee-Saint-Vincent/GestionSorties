<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label_classe = null;

    #[ORM\Column(length: 255)]
    private ?string $code_classe = null;

    #[ORM\OneToMany(mappedBy: 'id_classe', targetEntity: Eleve::class)]
    private Collection $eleve;

    #[ORM\OneToMany(mappedBy: 'id_niveau', targetEntity: Classe::class)]
    private Collection $classe;

    public function __construct()
    {
        $this->eleve = new ArrayCollection();
        $this->classe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabelClasse(): ?string
    {
        return $this->label_classe;
    }

    public function setLabelClasse(string $label_classe): self
    {
        $this->label_classe = $label_classe;

        return $this;
    }

    public function getCodeClasse(): ?string
    {
        return $this->code_classe;
    }

    public function setCodeClasse(string $code_classe): self
    {
        $this->code_classe = $code_classe;

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
            $eleve->setIdClasse($this);
        }

        return $this;
    }

    public function removeEleve(Eleve $eleve): self
    {
        if ($this->eleve->removeElement($eleve)) {
            // set the owning side to null (unless already changed)
            if ($eleve->getIdClasse() === $this) {
                $eleve->setIdClasse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Classe>
     */
    public function getClasse(): Collection
    {
        return $this->classe;
    }

    public function addClasse(Classe $classe): self
    {
        if (!$this->classe->contains($classe)) {
            $this->classe->add($classe);
            $classe->setIdNiveau($this);
        }

        return $this;
    }

    public function removeClasse(Classe $classe): self
    {
        if ($this->classe->removeElement($classe)) {
            // set the owning side to null (unless already changed)
            if ($classe->getIdNiveau() === $this) {
                $classe->setIdNiveau(null);
            }
        }

        return $this;
    }
}
