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

    #[ORM\ManyToMany(targetEntity: projet::class, inversedBy: 'ContenirProjets')]
    private Collection $id_projet;

    #[ORM\ManyToMany(targetEntity: Eleve::class, inversedBy: 'ContenirEleves')]
    private Collection $id_eleve;

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
     * @return Collection<int, projet>
     */
    public function getIdProjet(): Collection
    {
        return $this->id_projet;
    }

    public function addIdProjet(projet $idProjet): self
    {
        if (!$this->id_projet->contains($idProjet)) {
            $this->id_projet->add($idProjet);
        }

        return $this;
    }

    public function removeIdProjet(projet $idProjet): self
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
}
