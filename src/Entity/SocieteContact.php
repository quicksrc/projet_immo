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
    private ?int $id_societecontact = null;

    #[ORM\Column(length: 200)]
    private ?string $qualite = null;

    #[ORM\Column(length: 200)]
    private ?string $qualite_proprietaire = null;

    #[ORM\Column(length: 200)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $principal = null;

    public function getIdSocietecontact(): ?int
    {
        return $this->id_societecontact;
    }

    public function getQualite(): ?string
    {
        return $this->qualite;
    }

    public function setQualite(string $qualite): self
    {
        $this->qualite = $qualite;

        return $this;
    }

    public function getQualiteProprietaire(): ?string
    {
        return $this->qualite_proprietaire;
    }

    public function setQualiteProprietaire(string $qualite_proprietaire): self
    {
        $this->qualite_proprietaire = $qualite_proprietaire;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPrincipal(): ?int
    {
        return $this->principal;
    }

    public function setPrincipal(int $principal): self
    {
        $this->principal = $principal;

        return $this;
    }
}
