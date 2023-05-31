<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnseignantRepository::class)]
class Enseignant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_enseignant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom_enseignant = null;

    #[ORM\ManyToMany(targetEntity: Accompagner::class, mappedBy: 'enseignant_id')]
    private Collection $Accompagnant;

    #[ORM\OneToMany(mappedBy: 'enseignant_projet', targetEntity: Projet::class)]
    private Collection $projet;

    public function __construct()
    {
        $this->Accompagnant = new ArrayCollection();
        $this->projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEnseignant(): ?string
    {
        return $this->nom_enseignant;
    }

    public function setNomEnseignant(?string $nom_enseignant): self
    {
        $this->nom_enseignant = $nom_enseignant;

        return $this;
    }

    public function getPrenomEnseignant(): ?string
    {
        return $this->prenom_enseignant;
    }

    public function setPrenomEnseignant(?string $prenom_enseignant): self
    {
        $this->prenom_enseignant = $prenom_enseignant;

        return $this;
    }

    /**
     * @return Collection<int, Accompagner>
     */
    public function getAccompagnant(): Collection
    {
        return $this->Accompagnant;
    }

    public function addAccompagnant(Accompagner $accompagnant): self
    {
        if (!$this->Accompagnant->contains($accompagnant)) {
            $this->Accompagnant->add($accompagnant);
            $accompagnant->addEnseignantId($this);
        }

        return $this;
    }

    public function removeAccompagnant(Accompagner $accompagnant): self
    {
        if ($this->Accompagnant->removeElement($accompagnant)) {
            $accompagnant->removeEnseignantId($this);
        }

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
            $projet->setEnseignantProjet($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projet->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getEnseignantProjet() === $this) {
                $projet->setEnseignantProjet(null);
            }
        }

        return $this;
    }
}
