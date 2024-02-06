<?php

namespace App\Entity;

use App\Repository\RechercheImmeubleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechercheImmeubleRepository::class)]
class RechercheImmeuble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $refProprioImmeuble = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $numPlanchCada = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $etatDossier = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $enquete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateEnquete = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $suiviPar = null;

    #[ORM\Column(nullable: true)]
    private ?bool $vendu = null;

    #[ORM\Column(nullable: true)]
    private ?bool $ncpcf = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origineContact = null;

    #[ORM\Column(nullable: true)]
    private ?bool $visite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(nullable: true)]
    private ?int $numPrincipal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numSecondaire = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $typeVoie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomRue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cp = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $RCS = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $civiliteContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenomContact = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateActivite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $theme = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomRecherche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cpImmeubleContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $villeImmeubleContact = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $antiMailing = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $enqueteImmeuble = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $qualiteProprietaire = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $npai = null;

    public function __toString()
    {
        return $this->nomRecherche;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefProprioImmeuble(): ?int
    {
        return $this->refProprioImmeuble;
    }

    public function setRefProprioImmeuble(?int $refProprioImmeuble): self
    {
        $this->refProprioImmeuble = $refProprioImmeuble;

        return $this;
    }

    public function getNumPlanchCada(): ?string
    {
        return $this->numPlanchCada;
    }

    public function setNumPlanchCada(?string $numPlanchCada): self
    {
        $this->numPlanchCada = $numPlanchCada;

        return $this;
    }

    public function getEtatDossier(): ?string
    {
        return $this->etatDossier;
    }

    public function setEtatDossier(?string $etatDossier): self
    {
        $this->etatDossier = $etatDossier;

        return $this;
    }

    public function getEnquete(): ?string
    {
        return $this->enquete;
    }

    public function setEnquete(?string $enquete): self
    {
        $this->enquete = $enquete;

        return $this;
    }

    public function getDateEnquete(): ?\DateTimeInterface
    {
        return $this->dateEnquete;
    }

    public function setDateEnquete(?\DateTimeInterface $dateEnquete): self
    {
        $this->dateEnquete = $dateEnquete;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSuiviPar(): ?string
    {
        return $this->suiviPar;
    }

    public function setSuiviPar(?string $suiviPar): self
    {
        $this->suiviPar = $suiviPar;

        return $this;
    }

    public function isVendu(): ?bool
    {
        return $this->vendu;
    }

    public function setVendu(?bool $vendu): self
    {
        $this->vendu = $vendu;

        return $this;
    }

    public function isNcpcf(): ?bool
    {
        return $this->ncpcf;
    }

    public function setNcpcf(?bool $ncpcf): self
    {
        $this->ncpcf = $ncpcf;

        return $this;
    }

    public function getOrigineContact(): ?string
    {
        return $this->origineContact;
    }

    public function setOrigineContact(?string $origineContact): self
    {
        $this->origineContact = $origineContact;

        return $this;
    }

    public function isVisite(): ?bool
    {
        return $this->visite;
    }

    public function setVisite(?bool $visite): self
    {
        $this->visite = $visite;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNumPrincipal(): ?int
    {
        return $this->numPrincipal;
    }

    public function setNumPrincipal(?int $numPrincipal): self
    {
        $this->numPrincipal = $numPrincipal;

        return $this;
    }
    public function getNumSecondaire(): ?string
    {
        return $this->numSecondaire;
    }

    public function setNumSecondaire(?string $numSecondaire): self
    {
        $this->numSecondaire = $numSecondaire;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->typeVoie;
    }

    public function setTypeVoie(?string $typeVoie): self
    {
        $this->typeVoie = $typeVoie;

        return $this;
    }

    public function getNomRue(): ?string
    {
        return $this->nomRue;
    }

    public function setNomRue(?string $nomRue): self
    {
        $this->nomRue = $nomRue;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(?string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(?string $nomContact): self
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getRCS(): ?string
    {
        return $this->RCS;
    }

    public function setRCS(?string $RCS): self
    {
        $this->RCS = $RCS;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCiviliteContact(): ?string
    {
        return $this->civiliteContact;
    }

    public function setCiviliteContact(?string $civiliteContact): self
    {
        $this->civiliteContact = $civiliteContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(?string $prenomContact): self
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getDateActivite(): ?\DateTimeInterface
    {
        return $this->dateActivite;
    }

    public function setDateActivite(?\DateTimeInterface $dateActivite): self
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getNomRecherche(): ?string
    {
        return $this->nomRecherche;
    }

    public function setNomRecherche(?string $nomRecherche): static
    {
        $this->nomRecherche = $nomRecherche;

        return $this;
    }

    public function getCpImmeubleContact(): ?string
    {
        return $this->cpImmeubleContact;
    }

    public function setCpImmeubleContact(?string $cpImmeubleContact): static
    {
        $this->cpImmeubleContact = $cpImmeubleContact;

        return $this;
    }

    public function getVilleImmeubleContact(): ?string
    {
        return $this->villeImmeubleContact;
    }

    public function setVilleImmeubleContact(?string $villeImmeubleContact): static
    {
        $this->villeImmeubleContact = $villeImmeubleContact;

        return $this;
    }

    public function getAntiMailing(): ?int
    {
        return $this->antiMailing;
    }

    public function setAntiMailing(?int $antiMailing): static
    {
        $this->antiMailing = $antiMailing;

        return $this;
    }

    public function getEnqueteImmeuble(): ?string
    {
        return $this->enqueteImmeuble;
    }

    public function setEnqueteImmeuble(?string $enqueteImmeuble): static

    {
        $this->enqueteImmeuble = $enqueteImmeuble;
        return $this;
    }

    public function getQualiteProprietaire(): ?string
    {
        return $this->qualiteProprietaire;
    }

    public function setQualiteProprietaire(?string $qualiteProprietaire): static
    {
        $this->qualiteProprietaire = $qualiteProprietaire;

        return $this;
    }

    public function getNpai(): ?int
    {
        return $this->npai;
    }

    public function setNpai(?int $npai): self
    {
        $this->npai = $npai;

        return $this;
    }
}
