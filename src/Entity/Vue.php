<?php

namespace App\Entity;

use App\Repository\VueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VueRepository::class)]
class Vue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDVue = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $NomTable = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Intitule = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $NomConnexion = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ChampTri = null;

    #[ORM\Column(length: 4, nullable: true)]
    private ?string $OrdreTri = null;

    #[ORM\Column(nullable: true)]
    private ?int $PassageModeFiche = null;

    #[ORM\Column(nullable: true)]
    private ?int $ParDefaut = null;

    public function getId(): ?int
    {
        return $this->IDVue;
    }

    public function getNomTable(): ?string
    {
        return $this->NomTable;
    }

    public function setNomTable(?string $NomTable): self
    {
        $this->NomTable = $NomTable;

        return $this;
    }

    public function getIntitule(): ?string
    {
        return $this->Intitule;
    }

    public function setIntitule(?string $Intitule): self
    {
        $this->Intitule = $Intitule;

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

    public function getChampTri(): ?string
    {
        return $this->ChampTri;
    }

    public function setChampTri(?string $ChampTri): self
    {
        $this->ChampTri = $ChampTri;

        return $this;
    }

    public function getOrdreTri(): ?string
    {
        return $this->OrdreTri;
    }

    public function setOrdreTri(?string $OrdreTri): self
    {
        $this->OrdreTri = $OrdreTri;

        return $this;
    }

    public function getPassageModeFiche(): ?int
    {
        return $this->PassageModeFiche;
    }

    public function setPassageModeFiche(?int $PassageModeFiche): self
    {
        $this->PassageModeFiche = $PassageModeFiche;

        return $this;
    }

    public function getParDefaut(): ?int
    {
        return $this->ParDefaut;
    }

    public function setParDefaut(?int $ParDefaut): self
    {
        $this->ParDefaut = $ParDefaut;

        return $this;
    }
}
