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
}
