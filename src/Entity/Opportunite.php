<?php

namespace App\Entity;

use App\Repository\OpportuniteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpportuniteRepository::class)]
class Opportunite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDOpportunite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $SocieteConcernee = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $Gerance = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "IDImmeuble", referencedColumnName: "idimmeuble")]
    private ?Immeuble $IDImmeuble = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "IDSociete", referencedColumnName: "idsociete")]
    private ?Societe $IDSociete = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: "IDContact", referencedColumnName: "idcontact")]
    private ?Contact $IDContact = null;

    public function getIDOpportunite(): ?int
    {
        return $this->IDOpportunite;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(?\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getSocieteConcernee(): ?string
    {
        return $this->SocieteConcernee;
    }

    public function setSocieteConcernee(?string $SocieteConcernee): self
    {
        $this->SocieteConcernee = $SocieteConcernee;

        return $this;
    }

    public function getGerance(): ?int
    {
        return $this->Gerance;
    }

    public function setGerance(?int $Gerance): self
    {
        $this->Gerance = $Gerance;

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
