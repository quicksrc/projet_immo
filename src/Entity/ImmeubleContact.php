<?php

namespace App\Entity;

use App\Repository\ImmeubleContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmeubleContactRepository::class)]
class ImmeubleContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $qualite = null;

    #[ORM\Column(length: 200)]
    private ?string $qualite_proprietaire = null;

    #[ORM\Column(length: 200)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $principal = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $ne_vend_pas = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_nvp = null;

    #[ORM\ManyToOne(inversedBy: 'immeubleContacts')]
    private ?Immeuble $immeuble = null;

    #[ORM\ManyToOne(inversedBy: 'immeubleContacts')]
    private ?Contact $contact = null;

    public function getIdImmeublecontact(): ?int
    {
        return $this->id;
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

    public function getNeVendPas(): ?int
    {
        return $this->ne_vend_pas;
    }

    public function setNeVendPas(int $ne_vend_pas): self
    {
        $this->ne_vend_pas = $ne_vend_pas;

        return $this;
    }

    public function getDateNvp(): ?\DateTimeInterface
    {
        return $this->date_nvp;
    }

    public function setDateNvp(\DateTimeInterface $date_nvp): self
    {
        $this->date_nvp = $date_nvp;

        return $this;
    }

    public function getImmeuble(): ?Immeuble
    {
        return $this->immeuble;
    }

    public function setImmeuble(?Immeuble $immeuble): self
    {
        $this->immeuble = $immeuble;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }
}
