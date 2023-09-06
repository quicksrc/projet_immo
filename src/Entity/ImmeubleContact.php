<?php

namespace App\Entity;

use App\Repository\ImmeubleContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmeubleContactRepository::class)]
class ImmeubleContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDImmeubleContact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Qualite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $QualiteProprietaire = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Genre = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $Principal = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $NeVendPas = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateNVP = null;

    #[ORM\ManyToOne(targetEntity: Immeuble::class, cascade: ['remove'])]
    #[ORM\JoinColumn(name: "IDImmeuble", referencedColumnName: "idimmeuble")]
    private ?Immeuble $IDImmeuble = null;

    #[ORM\ManyToOne(targetEntity: Contact::class, cascade: ['remove'])]
    #[ORM\JoinColumn(name: "IDContact", referencedColumnName: "idcontact")]
    private ?Contact $IDContact = null;

    public function __construct()
    {
    }

    public function getIDImmeubleContact(): ?int
    {
        return $this->IDImmeubleContact;
    }

    public function getQualite(): ?string
    {
        return $this->Qualite;
    }

    public function setQualite(?string $Qualite): self
    {
        $this->Qualite = $Qualite;

        return $this;
    }

    public function getQualiteProprietaire(): ?string
    {
        return $this->QualiteProprietaire;
    }

    public function setQualiteProprietaire(?string $QualiteProprietaire): self
    {
        $this->QualiteProprietaire = $QualiteProprietaire;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->Genre;
    }

    public function setGenre(?string $Genre): self
    {
        $this->Genre = $Genre;

        return $this;
    }

    public function getPrincipal(): ?int
    {
        return $this->Principal;
    }

    public function setPrincipal(?int $Principal): self
    {
        $this->Principal = $Principal;

        return $this;
    }

    public function getNeVendPas(): ?int
    {
        return $this->NeVendPas;
    }

    public function setNeVendPas(?int $NeVendPas): self
    {
        $this->NeVendPas = $NeVendPas;

        return $this;
    }

    public function getDateNVP(): ?\DateTimeInterface
    {
        return $this->DateNVP;
    }

    public function setDateNVP(?\DateTimeInterface $DateNVP): self
    {
        $this->DateNVP = $DateNVP;

        return $this;
    }

    public function getIDImmeuble(): ?Immeuble
    {
        return $this->IDImmeuble;
    }

    public function setIDImmeuble(?Immeuble $IDImmeuble): self
    {
        $this->IDImmeuble = $IDImmeuble;

        return $this;
    }

    public function getIDContact(): ?Contact
    {
        return $this->IDContact;
    }

    public function setIDContact(?Contact $IDContact): self
    {
        $this->IDContact = $IDContact;

        return $this;
    }
}
