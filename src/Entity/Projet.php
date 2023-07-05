<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_projet = null;

    #[ORM\Column]
    private ?int $code_postal_projet = null;

    #[ORM\Column(length: 255)]
    private ?string $ville_projet = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_projet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $duree_projet = null;

    #[ORM\Column(nullable: true)]
    private ?float $cout_projet = null;

    #[ORM\Column(nullable: true)]
    private ?float $cout_transport = null;

    #[ORM\Column(nullable: true)]
    private ?float $cout_global_projet = null;

    #[ORM\Column(nullable: true)]
    private ?float $cout_etudiant_projet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $besoin_sandwich = null;

    #[ORM\Column(nullable: true)]
    private ?bool $pre_validation_projet = null;

    #[ORM\Column(nullable: true)]
    private ?bool $validation_projet = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_demande_projet = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heure_debut_sortie = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $heure_fin_sortie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $jour_sortie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut_voyage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin_voyage = null;

    #[ORM\ManyToOne(inversedBy: 'projets')]
    private ?Transport $transport_projet = null;

    #[ORM\ManyToMany(targetEntity: Accompagner::class, mappedBy: 'projet_id')]
    private Collection $Accompagnant;

    #[ORM\ManyToOne(inversedBy: 'projet')]
    private ?Enseignant $enseignant_projet = null;

    #[ORM\ManyToOne(inversedBy: 'projet')]
    private ?Categorie $categorie_projet = null;

    #[ORM\OneToMany(mappedBy: 'document_projet', targetEntity: Document::class)]
    private Collection $document;

    #[ORM\ManyToMany(targetEntity: Contenir::class, mappedBy: 'id_projet')]
    private Collection $ContenirProjets;

    #[ORM\Column(nullable: true)]
    private ?float $cout_annexe = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_debut_echange = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_fin_echange = null;

    #[ORM\Column(nullable: true)]
    private ?float $cout_hebergement_restauration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire_projet = null;

    #[ORM\Column(nullable: true)]
    private ?float $effectif_estime_projet = null;

    #[ORM\OneToMany(mappedBy: 'projet_activite', targetEntity: Activite::class)]
    private Collection $activite_projet;

    public function __construct()
    {
        $this->Accompagnant = new ArrayCollection();
        $this->document = new ArrayCollection();
        $this->ContenirEleves = new ArrayCollection();
        $this->ContenirProjets = new ArrayCollection();
        $this->activite_projet = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseProjet(): ?string
    {
        return $this->adresse_projet;
    }

    public function setAdresseProjet(string $adresse_projet): self
    {
        $this->adresse_projet = $adresse_projet;

        return $this;
    }

    public function getCodePostalProjet(): ?int
    {
        return $this->code_postal_projet;
    }

    public function setCodePostalProjet(int $code_postal_projet): self
    {
        $this->code_postal_projet = $code_postal_projet;

        return $this;
    }

    public function getVilleProjet(): ?string
    {
        return $this->ville_projet;
    }

    public function setVilleProjet(string $ville_projet): self
    {
        $this->ville_projet = $ville_projet;

        return $this;
    }

    public function getNomProjet(): ?string
    {
        return $this->nom_projet;
    }

    public function setNomProjet(string $nom_projet): self
    {
        $this->nom_projet = $nom_projet;

        return $this;
    }

    public function getDureeProjet(): ?string
    {
        return $this->duree_projet;
    }

    public function setDureeProjet(?string $duree_projet): self
    {
        $this->duree_projet = $duree_projet;

        return $this;
    }

    public function getCoutProjet(): ?float
    {
        return $this->cout_projet;
    }

    public function setCoutProjet(?float $cout_projet): self
    {
        $this->cout_projet = $cout_projet;

        return $this;
    }

    public function getCoutTransport(): ?float
    {
        return $this->cout_transport;
    }

    public function setCoutTransport(?float $cout_transport): self
    {
        $this->cout_transport = $cout_transport;

        return $this;
    }

    public function getCoutGlobalProjet(): ?float
    {
        return $this->cout_global_projet;
    }

    public function setCoutGlobalProjet(?float $cout_global_projet): self
    {
        $this->cout_global_projet = $cout_global_projet;

        return $this;
    }

    public function getCoutEtudiantProjet(): ?float
    {
        return $this->cout_etudiant_projet;
    }

    public function setCoutEtudiantProjet(?float $cout_etudiant_projet): self
    {
        $this->cout_etudiant_projet = $cout_etudiant_projet;

        return $this;
    }

    public function getBesoinSandwich(): ?string
    {
        return $this->besoin_sandwich;
    }

    public function setBesoinSandwich(?string $besoin_sandwich): self
    {
        $this->besoin_sandwich = $besoin_sandwich;

        return $this;
    }

    public function isPreValidationProjet(): ?bool
    {
        return $this->pre_validation_projet;
    }

    public function setPreValidationProjet(?bool $pre_validation_projet): self
    {
        $this->pre_validation_projet = $pre_validation_projet;

        return $this;
    }

    public function isValidationProjet(): ?bool
    {
        return $this->validation_projet;
    }

    public function setValidationProjet(?bool $validation_projet): self
    {
        $this->validation_projet = $validation_projet;

        return $this;
    }

    public function getDateDemandeProjet(): ?\DateTimeInterface
    {
        return $this->date_demande_projet;
    }

    public function setDateDemandeProjet(\DateTimeInterface $date_demande_projet): self
    {
        $this->date_demande_projet = $date_demande_projet;

        return $this;
    }

    public function getHeureDebutSortie(): ?\DateTimeInterface
    {
        return $this->heure_debut_sortie;
    }

    public function setHeureDebutSortie(?\DateTimeInterface $heure_debut_sortie): self
    {
        $this->heure_debut_sortie = $heure_debut_sortie;

        return $this;
    }

    public function getHeureFinSortie(): ?\DateTimeInterface
    {
        return $this->heure_fin_sortie;
    }

    public function setHeureFinSortie(?\DateTimeInterface $heure_fin_sortie): self
    {
        $this->heure_fin_sortie = $heure_fin_sortie;

        return $this;
    }

    public function getJourSortie(): ?\DateTimeInterface
    {
        return $this->jour_sortie;
    }

    public function setJourSortie(?\DateTimeInterface $jour_sortie): self
    {
        $this->jour_sortie = $jour_sortie;

        return $this;
    }

    public function getDateDebutVoyage(): ?\DateTimeInterface
    {
        return $this->date_debut_voyage;
    }

    public function setDateDebutVoyage(?\DateTimeInterface $date_debut_voyage): self
    {
        $this->date_debut_voyage = $date_debut_voyage;

        return $this;
    }

    public function getDateFinVoyage(): ?\DateTimeInterface
    {
        return $this->date_fin_voyage;
    }

    public function setDateFinVoyage(?\DateTimeInterface $date_fin_voyage): self
    {
        $this->date_fin_voyage = $date_fin_voyage;

        return $this;
    }

    public function getTransportProjet(): ?Transport
    {
        return $this->transport_projet;
    }

    public function setTransportProjet(?Transport $transport_projet): self
    {
        $this->transport_projet = $transport_projet;

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
            $accompagnant->addProjetId($this);
        }

        return $this;
    }

    public function removeAccompagnant(Accompagner $accompagnant): self
    {
        if ($this->Accompagnant->removeElement($accompagnant)) {
            $accompagnant->removeProjetId($this);
        }

        return $this;
    }

    public function getEnseignantProjet(): ?Enseignant
    {
        return $this->enseignant_projet;
    }

    public function setEnseignantProjet(?Enseignant $enseignant_projet): self
    {
        $this->enseignant_projet = $enseignant_projet;

        return $this;
    }

    public function getCategorieProjet(): ?Categorie
    {
        return $this->categorie_projet;
    }

    public function setCategorieProjet(?Categorie $categorie_projet): self
    {
        $this->categorie_projet = $categorie_projet;

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocument(): Collection
    {
        return $this->document;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->document->contains($document)) {
            $this->document->add($document);
            $document->setDocumentProjet($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->document->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getDocumentProjet() === $this) {
                $document->setDocumentProjet(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contenir>
     */
    public function getContenirProjets(): Collection
    {
        return $this->ContenirProjets;
    }

    public function addContenirProjet(Contenir $contenirProjet): self
    {
        if (!$this->ContenirProjets->contains($contenirProjet)) {
            $this->ContenirProjets->add($contenirProjet);
            $contenirProjet->addIdProjet($this);
        }

        return $this;
    }

    public function removeContenirProjet(Contenir $contenirProjet): self
    {
        if ($this->ContenirProjets->removeElement($contenirProjet)) {
            $contenirProjet->removeIdProjet($this);
        }

        return $this;
    }

    public function getCoutAnnexe(): ?float
    {
        return $this->cout_annexe;
    }

    public function setCoutAnnexe(?float $cout_annexe): self
    {
        $this->cout_annexe = $cout_annexe;

        return $this;
    }

    public function getDateDebutEchange(): ?\DateTimeInterface
    {
        return $this->date_debut_echange;
    }

    public function setDateDebutEchange(?\DateTimeInterface $date_debut_echange): self
    {
        $this->date_debut_echange = $date_debut_echange;

        return $this;
    }

    public function getDateFinEchange(): ?\DateTimeInterface
    {
        return $this->date_fin_echange;
    }

    public function setDateFinEchange(?\DateTimeInterface $date_fin_echange): self
    {
        $this->date_fin_echange = $date_fin_echange;

        return $this;
    }

    public function getCoutHebergementRestauration(): ?float
    {
        return $this->cout_hebergement_restauration;
    }

    public function setCoutHebergementRestauration(?float $cout_hebergement_restauration): self
    {
        $this->cout_hebergement_restauration = $cout_hebergement_restauration;

        return $this;
    }

    public function getCommentaireProjet(): ?string
    {
        return $this->commentaire_projet;
    }

    public function setCommentaireProjet(?string $commentaire_projet): self
    {
        $this->commentaire_projet = $commentaire_projet;

        return $this;
    }

    public function getEffectifEstimeProjet(): ?float
    {
        return $this->effectif_estime_projet;
    }

    public function setEffectifEstimeProjet(?float $effectif_estime_projet): self
    {
        $this->effectif_estime_projet = $effectif_estime_projet;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getActiviteProjet(): Collection
    {
        return $this->activite_projet;
    }

    public function addActiviteProjet(Activite $activiteProjet): self
    {
        if (!$this->activite_projet->contains($activiteProjet)) {
            $this->activite_projet->add($activiteProjet);
            $activiteProjet->setProjetActivite($this);
        }

        return $this;
    }

    public function removeActiviteProjet(Activite $activiteProjet): self
    {
        if ($this->activite_projet->removeElement($activiteProjet)) {
            // set the owning side to null (unless already changed)
            if ($activiteProjet->getProjetActivite() === $this) {
                $activiteProjet->setProjetActivite(null);
            }
        }

        return $this;
    }
}
