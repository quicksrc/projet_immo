<?php

namespace App\Entity;

use App\Repository\RechercheContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechercheContactRepository::class)]
class RechercheContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $civilite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseContact = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cpContact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $villeContact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fonction = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $correspondant = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $antiMailing = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $societeContact = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $npai = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $activiteContact = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $rcs = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $qualiteContact = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $neVendPas = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateActivite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $actionActivite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $themeActivite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaireActivite = null;

    #[ORM\Column(nullable: true)]
    private ?int $refProprioImmeuble = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origineContactImmeuble = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $ncpcfImmeuble = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $visiteImmeuble = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(?string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(?string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getCorrespondant(): ?string
    {
        return $this->correspondant;
    }

    public function setCorrespondant(?string $correspondant): self
    {
        $this->correspondant = $correspondant;

        return $this;
    }

    public function getAntiMailing(): ?int
    {
        return $this->antiMailing;
    }

    public function setAntiMailing(?int $antiMailing): self
    {
        $this->antiMailing = $antiMailing;

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

    public function getNpai(): ?int
    {
        return $this->npai;
    }

    public function setNpai(?int $npai): self
    {
        $this->npai = $npai;

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

    public function getRcs(): ?string
    {
        return $this->rcs;
    }

    public function setRcs(?string $rcs): self
    {
        $this->rcs = $rcs;

        return $this;
    }

    public function getQualiteContact(): ?string
    {
        return $this->qualiteContact;
    }

    public function setQualiteContact(?string $qualiteContact): self
    {
        $this->qualiteContact = $qualiteContact;

        return $this;
    }

    public function getNeVendPas(): ?int
    {
        return $this->neVendPas;
    }

    public function setNeVendPas(?int $neVendPas): self
    {
        $this->neVendPas = $neVendPas;

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

    public function getActionActivite(): ?string
    {
        return $this->actionActivite;
    }

    public function setActionActivite(?string $actionActivite): self
    {
        $this->actionActivite = $actionActivite;

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

    public function getCommentaireActivite(): ?string
    {
        return $this->commentaireActivite;
    }

    public function setCommentaireActivite(?string $commentaireActivite): self
    {
        $this->commentaireActivite = $commentaireActivite;

        return $this;
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

    public function getOrigineContactImmeuble(): ?string
    {
        return $this->origineContactImmeuble;
    }

    public function setOrigineContactImmeuble(?string $origineContactImmeuble): self
    {
        $this->origineContactImmeuble = $origineContactImmeuble;

        return $this;
    }

    public function getNcpcfImmeuble(): ?int
    {
        return $this->ncpcfImmeuble;
    }

    public function setNcpcfImmeuble(?int $ncpcfImmeuble): self
    {
        $this->ncpcfImmeuble = $ncpcfImmeuble;

        return $this;
    }

    public function getVisiteImmeuble(): ?int
    {
        return $this->visiteImmeuble;
    }

    public function setVisiteImmeuble(?int $visiteImmeuble): self
    {
        $this->visiteImmeuble = $visiteImmeuble;

        return $this;
    }
}
