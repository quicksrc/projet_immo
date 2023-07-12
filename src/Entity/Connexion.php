<?php

namespace App\Entity;

use App\Repository\ConnexionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConnexionRepository::class)]
class Connexion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDConnexion = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $AdresseIP = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateDebut = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $HeureDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateFin = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $HeureFin = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $NomConnexion = null;

    public function getId(): ?int
    {
        return $this->IDConnexion;
    }

    public function getAdresseIP(): ?string
    {
        return $this->AdresseIP;
    }

    public function setAdresseIP(?string $AdresseIP): self
    {
        $this->AdresseIP = $AdresseIP;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getHeureDebut(): ?string
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(?string $HeureDebut): self
    {
        $this->HeureDebut = $HeureDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(?\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getHeureFin(): ?string
    {
        return $this->HeureFin;
    }

    public function setHeureFin(?string $HeureFin): self
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    public function getNomConnexion(): ?string
    {
        return $this->NomConnexion;
    }

    public function setNomConnexion(?string $NomConnexion): self
    {
        $this->NomConnexion = $NomConnexion;

        return $this;
    }
}
