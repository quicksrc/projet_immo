<?php

namespace App\Entity;

use App\Repository\RechercheSocieteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechercheSocieteRepository::class)]
class RechercheSociete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etatDossier = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $responsable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origineContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $raisonSocialeVendeur = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cpVendeur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $raisonSocialeAcheteur = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cpAcheteur = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $civiliteContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenomContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseContact = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cpContact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $villeContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fonctionContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $correspondantContact = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $antiMailingContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $societeContact = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $npaiContact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $activiteContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $rcsContact = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $principalContact = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateActivite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $themeActivite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $actionActivite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaireActivite = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

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

    public function getRaisonSocialeVendeur(): ?string
    {
        return $this->raisonSocialeVendeur;
    }

    public function setRaisonSocialeVendeur(?string $raisonSocialeVendeur): self
    {
        $this->raisonSocialeVendeur = $raisonSocialeVendeur;

        return $this;
    }

    public function getCpVendeur(): ?string
    {
        return $this->cpVendeur;
    }

    public function setCpVendeur(?string $cpVendeur): self
    {
        $this->cpVendeur = $cpVendeur;

        return $this;
    }

    public function getRaisonSocialeAcheteur(): ?string
    {
        return $this->raisonSocialeAcheteur;
    }

    public function setRaisonSocialeAcheteur(?string $raisonSocialeAcheteur): self
    {
        $this->raisonSocialeAcheteur = $raisonSocialeAcheteur;

        return $this;
    }

    public function getCpAcheteur(): ?string
    {
        return $this->cpAcheteur;
    }

    public function setCpAcheteur(?string $cpAcheteur): self
    {
        $this->cpAcheteur = $cpAcheteur;

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

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(?string $nomContact): self
    {
        $this->nomContact = $nomContact;

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

    public function getAdresseContact(): ?string
    {
        return $this->adresseContact;
    }

    public function setAdresseContact(?string $adresseContact): self
    {
        $this->adresseContact = $adresseContact;

        return $this;
    }

    public function getCpContact(): ?string
    {
        return $this->cpContact;
    }

    public function setCpContact(?string $cpContact): self
    {
        $this->cpContact = $cpContact;

        return $this;
    }

    public function getVilleContact(): ?string
    {
        return $this->villeContact;
    }

    public function setVilleContact(?string $villeContact): self
    {
        $this->villeContact = $villeContact;

        return $this;
    }

    public function getFonctionContact(): ?string
    {
        return $this->fonctionContact;
    }

    public function setFonctionContact(?string $fonctionContact): self
    {
        $this->fonctionContact = $fonctionContact;

        return $this;
    }

    public function getCorrespondantContact(): ?string
    {
        return $this->correspondantContact;
    }

    public function setCorrespondantContact(?string $correspondantContact): self
    {
        $this->correspondantContact = $correspondantContact;

        return $this;
    }

    public function getAntiMailingContact(): ?int
    {
        return $this->antiMailingContact;
    }

    public function setAntiMailingContact(?int $antiMailingContact): self
    {
        $this->antiMailingContact = $antiMailingContact;

        return $this;
    }

    public function getSocieteContact(): ?string
    {
        return $this->societeContact;
    }

    public function setSocieteContact(?string $societeContact): self
    {
        $this->societeContact = $societeContact;

        return $this;
    }

    public function getNpaiContact(): ?int
    {
        return $this->npaiContact;
    }

    public function setNpaiContact(?int $npaiContact): self
    {
        $this->npaiContact = $npaiContact;

        return $this;
    }

    public function getActiviteContact(): ?string
    {
        return $this->activiteContact;
    }

    public function setActiviteContact(?string $activiteContact): self
    {
        $this->activiteContact = $activiteContact;

        return $this;
    }

    public function getRcsContact(): ?string
    {
        return $this->rcsContact;
    }

    public function setRcsContact(?string $rcsContact): self
    {
        $this->rcsContact = $rcsContact;

        return $this;
    }

    public function getPrincipalContact(): ?int
    {
        return $this->principalContact;
    }

    public function setPrincipalContact(?int $principalContact): self
    {
        $this->principalContact = $principalContact;

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

    public function getThemeActivite(): ?string
    {
        return $this->themeActivite;
    }

    public function setThemeActivite(?string $themeActivite): self
    {
        $this->themeActivite = $themeActivite;

        return $this;
    }

    public function getActionActivite(): ?string
    {
        return $this->actionActivite;
    }

    public function setActionActivite(?string $actionActivite): self
    {
        $this->actionActivite = $actionActivite;

        return $this;
    }

    public function getCommentaireActivite(): ?string
    {
        return $this->commentaireActivite;
    }

    public function setCommentaireActivite(?string $commentaireActivite): self
    {
        $this->commentaireActivite = $commentaireActivite;

        return $this;
    }
}
