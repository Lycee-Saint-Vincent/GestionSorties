<?php

namespace App\Entity;

use App\Repository\ContenirRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContenirRepository::class)]
class Contenir
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Projet::class, inversedBy: 'ContenirProjets')]
    private Collection $id_projet;

    #[ORM\ManyToMany(targetEntity: Eleve::class, inversedBy: 'ContenirEleves')]
    private Collection $id_eleve;

    #[ORM\Column(length: 255)]
    private ?string $commentaire = null;

    #[ORM\Column]
    private ?float $prise_charge_culture = null;

    #[ORM\Column]
    private ?float $prise_charge_lycee = null;

    public function __construct()
    {
        $this->id_projet = new ArrayCollection();
        $this->id_eleve = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getIdProjet(): Collection
    {
        return $this->id_projet;
    }

    public function addIdProjet(Projet $idProjet): self
    {
        if (!$this->id_projet->contains($idProjet)) {
            $this->id_projet->add($idProjet);
        }

        return $this;
    }

    public function removeIdProjet(Projet $idProjet): self
    {
        $this->id_projet->removeElement($idProjet);

        return $this;
    }

    /**
     * @return Collection<int, Eleve>
     */
    public function getIdEleve(): Collection
    {
        return $this->id_eleve;
    }

    public function addIdEleve(Eleve $idEleve): self
    {
        if (!$this->id_eleve->contains($idEleve)) {
            $this->id_eleve->add($idEleve);
        }

        return $this;
    }

    public function removeIdEleve(Eleve $idEleve): self
    {
        $this->id_eleve->removeElement($idEleve);

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getPriseChargeCulture(): ?float
    {
        return $this->prise_charge_culture;
    }

    public function setPriseChargeCulture(float $prise_charge_culture): self
    {
        $this->prise_charge_culture = $prise_charge_culture;

        return $this;
    }

    public function getPriseChargeLycee(): ?float
    {
        return $this->prise_charge_lycee;
    }

    public function setPriseChargeLycee(float $prise_charge_lycee): self
    {
        $this->prise_charge_lycee = $prise_charge_lycee;

        return $this;
    }
}
