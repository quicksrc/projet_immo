<?php

namespace App\Entity;

use App\Repository\AdresseIPRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseIPRepository::class)]
class AdresseIP
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDAdresseIP = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $Groupe = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $AdresseDepart = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $AdresseFin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomPlage = null;

    public function getId(): ?int
    {
        return $this->IDAdresseIP;
    }

    public function getGroupe(): ?int
    {
        return $this->Groupe;
    }

    public function setGroupe(?int $Groupe): self
    {
        $this->Groupe = $Groupe;

        return $this;
    }

    public function getAdresseDepart(): ?string
    {
        return $this->AdresseDepart;
    }

    public function setAdresseDepart(?string $AdresseDepart): self
    {
        $this->AdresseDepart = $AdresseDepart;

        return $this;
    }

    public function getAdresseFin(): ?string
    {
        return $this->AdresseFin;
    }

    public function setAdresseFin(?string $AdresseFin): self
    {
        $this->AdresseFin = $AdresseFin;

        return $this;
    }

    public function getNomPlage(): ?string
    {
        return $this->NomPlage;
    }

    public function setNomPlage(?string $NomPlage): self
    {
        $this->NomPlage = $NomPlage;

        return $this;
    }
}
