<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $ID_Contact = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateModification = null;

    #[ORM\Column(length: 200)]
    private ?string $Civilite = null;

    #[ORM\Column(length: 510)]
    private ?string $Nom = null;

    #[ORM\Column(length: 510)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 510)]
    private ?string $Societe = null;

    #[ORM\Column(length: 510)]
    private ?string $Correspondant = null;

    #[ORM\Column(length: 510)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 40)]
    private ?string $CP = null;

    #[ORM\Column(length: 200)]
    private ?string $Ville = null;

    #[ORM\Column(length: 200)]
    private ?string $Pays = null;

    #[ORM\Column(length: 40)]
    private ?string $Telephone = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $Fax = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $TelephonePortable = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $TelephoneDomicile = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $ListeRouge = null;

    #[ORM\Column(length: 510)]
    private ?string $Email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateNaissance = null;

    #[ORM\Column(length: 200)]
    private ?string $Activite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $RCS = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $AntiMailing = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $NPAI = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\Column(length: 510)]
    private ?string $Fonction = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $DCD = null;

    public function getIDContact(): ?int
    {
        return $this->ID_Contact;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->DateModification;
    }

    public function setDateModification(\DateTimeInterface $DateModification): self
    {
        $this->DateModification = $DateModification;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->Civilite;
    }

    public function setCivilite(string $Civilite): self
    {
        $this->Civilite = $Civilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->Societe;
    }

    public function setSociete(string $Societe): self
    {
        $this->Societe = $Societe;

        return $this;
    }

    public function getCorrespondant(): ?string
    {
        return $this->Correspondant;
    }

    public function setCorrespondant(string $Correspondant): self
    {
        $this->Correspondant = $Correspondant;

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

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(?string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->TelephonePortable;
    }

    public function setTelephonePortable(?string $TelephonePortable): self
    {
        $this->TelephonePortable = $TelephonePortable;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->TelephoneDomicile;
    }

    public function setTelephoneDomicile(?string $TelephoneDomicile): self
    {
        $this->TelephoneDomicile = $TelephoneDomicile;

        return $this;
    }

    public function getListeRouge(): ?int
    {
        return $this->ListeRouge;
    }

    public function setListeRouge(int $ListeRouge): self
    {
        $this->ListeRouge = $ListeRouge;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->Activite;
    }

    public function setActivite(string $Activite): self
    {
        $this->Activite = $Activite;

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

    public function getAntiMailing(): ?int
    {
        return $this->AntiMailing;
    }

    public function setAntiMailing(int $AntiMailing): self
    {
        $this->AntiMailing = $AntiMailing;

        return $this;
    }

    public function getNPAI(): ?int
    {
        return $this->NPAI;
    }

    public function setNPAI(int $NPAI): self
    {
        $this->NPAI = $NPAI;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->Fonction;
    }

    public function setFonction(string $Fonction): self
    {
        $this->Fonction = $Fonction;

        return $this;
    }

    public function getDCD(): ?int
    {
        return $this->DCD;
    }

    public function setDCD(int $DCD): self
    {
        $this->DCD = $DCD;

        return $this;
    }
}
