<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDAdresse = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $NumPrincipal = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $NumSecondaire = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $TypeVoie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $CP = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Ville = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $AdressePrincipale = null;

    #[ORM\ManyToOne(inversedBy: 'adresses', cascade: ['persist'])]
    #[ORM\JoinColumn(name: "IDImmeuble", referencedColumnName: "idimmeuble")]
    private ?Immeuble $IDImmeuble = null;

    public function getIDAdresse(): ?int
    {
        return $this->IDAdresse;
    }

    public function getNumPrincipal(): ?string
    {
        return $this->NumPrincipal;
    }

    public function setNumPrincipal(?string $NumPrincipal): self
    {
        $this->NumPrincipal = $NumPrincipal;

        return $this;
    }

    public function getNumSecondaire(): ?string
    {
        return $this->NumSecondaire;
    }

    public function setNumSecondaire(?string $NumSecondaire): self
    {
        $this->NumSecondaire = $NumSecondaire;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->TypeVoie;
    }

    public function setTypeVoie(?string $TypeVoie): self
    {
        $this->TypeVoie = $TypeVoie;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(?string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(?string $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(?string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getAdressePrincipale(): ?int
    {
        return $this->AdressePrincipale;
    }

    public function setAdressePrincipale(?int $AdressePrincipale): self
    {
        $this->AdressePrincipale = $AdressePrincipale;

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

    public function __clone()
    {
        $this->IDAdresse = null;
    }
}
