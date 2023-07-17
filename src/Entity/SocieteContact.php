<?php

namespace App\Entity;

use App\Repository\SocieteContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocieteContactRepository::class)]
class SocieteContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDSocieteContact = null;

    #[ORM\Column(nullable: true)]
    private ?int $Qualite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $QualiteProprietaire = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Genre = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $Principal = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "IDSociete", referencedColumnName: "idsociete")]
    private ?Societe $IDSociete = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: "IDContact", referencedColumnName: "idcontact")]
    private ?Contact $IDContact = null;

    public function getId(): ?int
    {
        return $this->IDSocieteContact;
    }

    public function getQualite(): ?int
    {
        return $this->Qualite;
    }

    public function setQualite(?int $Qualite): self
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

    public function getIDSociete(): ?Societe
    {
        return $this->IDSociete;
    }

    public function setIDSociete(?Societe $IDSociete): self
    {
        $this->IDSociete = $IDSociete;

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
