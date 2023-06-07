<?php

namespace App\Entity;

use App\Repository\ImmeubleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmeubleRepository::class)]
class Immeuble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $ID_Immeuble = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateEnquete = null;

    #[ORM\Column]
    private ?int $ReferenceProprio = null;

    #[ORM\Column(length: 20)]
    private ?string $NumPlancheCadast = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $SMS = null;

    #[ORM\Column(length: 200)]
    private ?string $EtatDossier = null;

    #[ORM\Column(length: 200)]
    private ?string $Enquete = null;

    #[ORM\Column(length: 300)]
    private ?string $NomGardien = null;

    #[ORM\Column(length: 200)]
    private ?string $Description = null;

    #[ORM\Column(length: 200)]
    private ?string $SuiviPar = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Vendu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateVente = null;

    #[ORM\Column(length: 510)]
    private ?string $OrigineContact = null;

    #[ORM\Column(length: 510)]
    private ?string $Intermediaire = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $NCPCF = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Visite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Commentaire = null;

    #[ORM\Column]
    private ?int $NumPrincipal = null;

    #[ORM\Column(length: 20)]
    private ?string $NumSecondaire = null;

    #[ORM\Column(length: 40)]
    private ?string $TypeVoie = null;

    #[ORM\Column(length: 510)]
    private ?string $NomRue = null;

    #[ORM\Column(length: 510)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 510)]
    private ?string $CP = null;

    #[ORM\Column(length: 510)]
    private ?string $Ville = null;

    #[ORM\Column(length: 200)]
    private ?string $ContactPrincipal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Photo1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Photo2 = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateVisite = null;

    #[ORM\Column(length: 100)]
    private ?string $RegroupementAct = null;

    public function getIDImmeuble(): ?int
    {
        return $this->ID_Immeuble;
    }

    public function getDateEnquete(): ?\DateTimeInterface
    {
        return $this->DateEnquete;
    }

    public function setDateEnquete(\DateTimeInterface $DateEnquete): self
    {
        $this->DateEnquete = $DateEnquete;

        return $this;
    }

    public function getReferenceProprio(): ?int
    {
        return $this->ReferenceProprio;
    }

    public function setReferenceProprio(int $ReferenceProprio): self
    {
        $this->ReferenceProprio = $ReferenceProprio;

        return $this;
    }

    public function getNumPlancheCadast(): ?string
    {
        return $this->NumPlancheCadast;
    }

    public function setNumPlancheCadast(string $NumPlancheCadast): self
    {
        $this->NumPlancheCadast = $NumPlancheCadast;

        return $this;
    }

    public function getSMS(): ?int
    {
        return $this->SMS;
    }

    public function setSMS(int $SMS): self
    {
        $this->SMS = $SMS;

        return $this;
    }

    public function getEtatDossier(): ?string
    {
        return $this->EtatDossier;
    }

    public function setEtatDossier(string $EtatDossier): self
    {
        $this->EtatDossier = $EtatDossier;

        return $this;
    }

    public function getEnquete(): ?string
    {
        return $this->Enquete;
    }

    public function setEnquete(string $Enquete): self
    {
        $this->Enquete = $Enquete;

        return $this;
    }

    public function getNomGardien(): ?string
    {
        return $this->NomGardien;
    }

    public function setNomGardien(string $NomGardien): self
    {
        $this->NomGardien = $NomGardien;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getSuiviPar(): ?string
    {
        return $this->SuiviPar;
    }

    public function setSuiviPar(string $SuiviPar): self
    {
        $this->SuiviPar = $SuiviPar;

        return $this;
    }

    public function getVendu(): ?int
    {
        return $this->Vendu;
    }

    public function setVendu(int $Vendu): self
    {
        $this->Vendu = $Vendu;

        return $this;
    }

    public function getDateVente(): ?\DateTimeInterface
    {
        return $this->DateVente;
    }

    public function setDateVente(\DateTimeInterface $DateVente): self
    {
        $this->DateVente = $DateVente;

        return $this;
    }

    public function getOrigineContact(): ?string
    {
        return $this->OrigineContact;
    }

    public function setOrigineContact(string $OrigineContact): self
    {
        $this->OrigineContact = $OrigineContact;

        return $this;
    }

    public function getIntermediaire(): ?string
    {
        return $this->Intermediaire;
    }

    public function setIntermediaire(string $Intermediaire): self
    {
        $this->Intermediaire = $Intermediaire;

        return $this;
    }

    public function getNCPCF(): ?int
    {
        return $this->NCPCF;
    }

    public function setNCPCF(int $NCPCF): self
    {
        $this->NCPCF = $NCPCF;

        return $this;
    }

    public function getVisite(): ?int
    {
        return $this->Visite;
    }

    public function setVisite(int $Visite): self
    {
        $this->Visite = $Visite;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getNumPrincipal(): ?int
    {
        return $this->NumPrincipal;
    }

    public function setNumPrincipal(int $NumPrincipal): self
    {
        $this->NumPrincipal = $NumPrincipal;

        return $this;
    }

    public function getNumSecondaire(): ?string
    {
        return $this->NumSecondaire;
    }

    public function setNumSecondaire(string $NumSecondaire): self
    {
        $this->NumSecondaire = $NumSecondaire;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->TypeVoie;
    }

    public function setTypeVoie(string $TypeVoie): self
    {
        $this->TypeVoie = $TypeVoie;

        return $this;
    }

    public function getNomRue(): ?string
    {
        return $this->NomRue;
    }

    public function setNomRue(string $NomRue): self
    {
        $this->NomRue = $NomRue;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(string $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getContactPrincipal(): ?string
    {
        return $this->ContactPrincipal;
    }

    public function setContactPrincipal(string $ContactPrincipal): self
    {
        $this->ContactPrincipal = $ContactPrincipal;

        return $this;
    }

    public function getPhoto1(): ?string
    {
        return $this->Photo1;
    }

    public function setPhoto1(?string $Photo1): self
    {
        $this->Photo1 = $Photo1;

        return $this;
    }

    public function getPhoto2(): ?string
    {
        return $this->Photo2;
    }

    public function setPhoto2(?string $Photo2): self
    {
        $this->Photo2 = $Photo2;

        return $this;
    }

    public function getDateVisite(): ?\DateTimeInterface
    {
        return $this->DateVisite;
    }

    public function setDateVisite(?\DateTimeInterface $DateVisite): self
    {
        $this->DateVisite = $DateVisite;

        return $this;
    }

    public function getRegroupementAct(): ?string
    {
        return $this->RegroupementAct;
    }

    public function setRegroupementAct(string $RegroupementAct): self
    {
        $this->RegroupementAct = $RegroupementAct;

        return $this;
    }
}
