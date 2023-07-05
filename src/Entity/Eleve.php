<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EleveRepository::class)]
class Eleve
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_eleve = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_eleve = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe_eleve = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance_eleve = null;

    #[ORM\Column(length: 255)]
    private ?string $photo_eleve = null;

    #[ORM\ManyToMany(targetEntity: Contenir::class, mappedBy: 'id_eleve')]
    private Collection $ContenirEleves;

    #[ORM\ManyToOne(inversedBy: 'eleve')]
    private ?Classe $id_classe = null;

    #[ORM\ManyToOne(inversedBy: 'eleve')]
    private ?Groupe $id_groupe = null;

    public function __construct()
    {
        $this->ContenirEleves = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEleve(): ?string
    {
        return $this->nom_eleve;
    }

    public function setNomEleve(string $nom_eleve): self
    {
        $this->nom_eleve = $nom_eleve;

        return $this;
    }

    public function getPrenomEleve(): ?string
    {
        return $this->prenom_eleve;
    }

    public function setPrenomEleve(string $prenom_eleve): self
    {
        $this->prenom_eleve = $prenom_eleve;

        return $this;
    }

    public function getSexeEleve(): ?string
    {
        return $this->sexe_eleve;
    }

    public function setSexeEleve(string $sexe_eleve): self
    {
        $this->sexe_eleve = $sexe_eleve;

        return $this;
    }

    public function getDateNaissanceEleve(): ?\DateTimeInterface
    {
        return $this->date_naissance_eleve;
    }

    public function setDateNaissanceEleve(\DateTimeInterface $date_naissance_eleve): self
    {
        $this->date_naissance_eleve = $date_naissance_eleve;

        return $this;
    }

    public function getPhotoEleve(): ?string
    {
        return $this->photo_eleve;
    }

    public function setPhotoEleve(string $photo_eleve): self
    {
        $this->photo_eleve = $photo_eleve;

        return $this;
    }

    /**
     * @return Collection<int, Contenir>
     */
    public function getContenirEleves(): Collection
    {
        return $this->ContenirEleves;
    }

    public function addContenirElefe(Contenir $contenirElefe): self
    {
        if (!$this->ContenirEleves->contains($contenirElefe)) {
            $this->ContenirEleves->add($contenirElefe);
            $contenirElefe->addIdEleve($this);
        }

        return $this;
    }

    public function removeContenirElefe(Contenir $contenirElefe): self
    {
        if ($this->ContenirEleves->removeElement($contenirElefe)) {
            $contenirElefe->removeIdEleve($this);
        }

        return $this;
    }

    public function getIdClasse(): ?Classe
    {
        return $this->id_classe;
    }

    public function setIdClasse(?Classe $id_classe): self
    {
        $this->id_classe = $id_classe;

        return $this;
    }

    public function getIdGroupe(): ?Groupe
    {
        return $this->id_groupe;
    }

    public function setIdGroupe(?Groupe $id_groupe): self
    {
        $this->id_groupe = $id_groupe;

        return $this;
    }
}
