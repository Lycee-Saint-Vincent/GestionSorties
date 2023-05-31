<?php

namespace App\Entity;

use App\Repository\FinancementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinancementRepository::class)]
class Financement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle_financement = null;

    #[ORM\OneToMany(mappedBy: 'financement_projet', targetEntity: Projet::class)]
    private Collection $projet;

    public function __construct()
    {
        $this->projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleFinancement(): ?string
    {
        return $this->libelle_financement;
    }

    public function setLibelleFinancement(?string $libelle_financement): self
    {
        $this->libelle_financement = $libelle_financement;

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projet->contains($projet)) {
            $this->projet->add($projet);
            $projet->setFinancementProjet($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projet->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getFinancementProjet() === $this) {
                $projet->setFinancementProjet(null);
            }
        }

        return $this;
    }
}
