<?php

namespace App\Entity;

use App\Repository\VendeurSocieteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VendeurSocieteRepository::class)]
class VendeurSociete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 510)]
    private ?string $raison_sociale = null;

    #[ORM\Column(length: 40)]
    private ?string $telephone = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $rcs = null;

    #[ORM\Column]
    private ?float $capital = null;

    #[ORM\Column(length: 200)]
    private ?string $nom_dirigeant = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $tel_portable = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $tel_perso = null;

    #[ORM\Column(length: 510)]
    private ?string $email = null;

    #[ORM\Column(length: 510)]
    private ?string $adresse_fo = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\ManyToOne(inversedBy: 'vendeurSocietes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    public function getIdVendeursociete(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raison_sociale;
    }

    public function setRaisonSociale(string $raison_sociale): self
    {
        $this->raison_sociale = $raison_sociale;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

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

    public function getCapital(): ?float
    {
        return $this->capital;
    }

    public function setCapital(float $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getNomDirigeant(): ?string
    {
        return $this->nom_dirigeant;
    }

    public function setNomDirigeant(string $nom_dirigeant): self
    {
        $this->nom_dirigeant = $nom_dirigeant;

        return $this;
    }

    public function getTelPortable(): ?string
    {
        return $this->tel_portable;
    }

    public function setTelPortable(?string $tel_portable): self
    {
        $this->tel_portable = $tel_portable;

        return $this;
    }

    public function getTelPerso(): ?string
    {
        return $this->tel_perso;
    }

    public function setTelPerso(?string $tel_perso): self
    {
        $this->tel_perso = $tel_perso;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getVendeurAdresseFo(): ?string
    {
        return $this->adresse_fo;
    }

    public function setVendeurAdresseFo(string $adresse_fo): self
    {
        $this->adresse_fo = $adresse_fo;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
