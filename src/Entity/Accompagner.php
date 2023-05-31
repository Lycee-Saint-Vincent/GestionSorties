<?php

namespace App\Entity;

use App\Repository\AccompagnerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccompagnerRepository::class)]
class Accompagner
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: enseignant::class, inversedBy: 'Accompagnant')]
    private Collection $enseignant_id;

    #[ORM\ManyToMany(targetEntity: projet::class, inversedBy: 'Accompagnant')]
    private Collection $projet_id;

    public function __construct()
    {
        $this->enseignant_id = new ArrayCollection();
        $this->projet_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, enseignant>
     */
    public function getEnseignantId(): Collection
    {
        return $this->enseignant_id;
    }

    public function addEnseignantId(enseignant $enseignantId): self
    {
        if (!$this->enseignant_id->contains($enseignantId)) {
            $this->enseignant_id->add($enseignantId);
        }

        return $this;
    }

    public function removeEnseignantId(enseignant $enseignantId): self
    {
        $this->enseignant_id->removeElement($enseignantId);

        return $this;
    }

    /**
     * @return Collection<int, projet>
     */
    public function getProjetId(): Collection
    {
        return $this->projet_id;
    }

    public function addProjetId(projet $projetId): self
    {
        if (!$this->projet_id->contains($projetId)) {
            $this->projet_id->add($projetId);
        }

        return $this;
    }

    public function removeProjetId(projet $projetId): self
    {
        $this->projet_id->removeElement($projetId);

        return $this;
    }
}
