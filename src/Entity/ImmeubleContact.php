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

    #[ORM\ManyToMany(targetEntity: Immeuble::class, inversedBy: 'immeubleContacts')]
    #[ORM\JoinColumn(name: "IDImmeubleContact", referencedColumnName: "IDImmeubleContact")]
    #[ORM\InverseJoinColumn(name: "IDImmeuble", referencedColumnName: "IDImmeuble")]
    private Collection $IDImmeuble;

    #[ORM\ManyToMany(targetEntity: Contact::class, inversedBy: 'immeubleContacts')]
    #[ORM\JoinColumn(name: "IDImmeubleContact", referencedColumnName: "IDImmeubleContact")]
    #[ORM\InverseJoinColumn(name: "IDContact", referencedColumnName: "IDContact")]
    private Collection $IDContact;

    public function __construct()
    {
        $this->IDImmeuble = new ArrayCollection();
        $this->IDContact = new ArrayCollection();
    }

    public function getId(): ?int
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

    /**
     * @return Collection<int, Immeuble>
     */
    public function getIDImmeuble(): Collection
    {
        return $this->IDImmeuble;
    }

    public function addIDImmeuble(Immeuble $iDImmeuble): self
    {
        if (!$this->IDImmeuble->contains($iDImmeuble)) {
            $this->IDImmeuble->add($iDImmeuble);
        }

        return $this;
    }

    public function removeIDImmeuble(Immeuble $iDImmeuble): self
    {
        $this->IDImmeuble->removeElement($iDImmeuble);

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getIDContact(): Collection
    {
        return $this->IDContact;
    }

    public function addIDContact(Contact $iDContact): self
    {
        if (!$this->IDContact->contains($iDContact)) {
            $this->IDContact->add($iDContact);
        }

        return $this;
    }

    public function removeIDContact(Contact $iDContact): self
    {
        $this->IDContact->removeElement($iDContact);

        return $this;
    }
}
