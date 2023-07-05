<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
class Document
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $libelle_document = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom_fichier = null;

    #[ORM\ManyToOne(inversedBy: 'document')]
    private ?Projet $document_projet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleDocument(): ?string
    {
        return $this->libelle_document;
    }

    public function setLibelleDocument(?string $libelle_document): self
    {
        $this->libelle_document = $libelle_document;

        return $this;
    }

    public function getNomFichier(): ?string
    {
        return $this->nom_fichier;
    }

    public function setNomFichier(?string $nom_fichier): self
    {
        $this->nom_fichier = $nom_fichier;

        return $this;
    }

    public function getDocumentProjet(): ?Projet
    {
        return $this->document_projet;
    }

    public function setDocumentProjet(?Projet $document_projet): self
    {
        $this->document_projet = $document_projet;

        return $this;
    }
}
