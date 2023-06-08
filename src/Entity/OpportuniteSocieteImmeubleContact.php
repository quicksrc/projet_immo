<?php

namespace App\Entity;

use App\Repository\OpportuniteSocieteImmeubleContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpportuniteSocieteImmeubleContactRepository::class)]
class OpportuniteSocieteImmeubleContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_opportunite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(length: 200)]
    private ?string $societe_concernee = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $gerance = null;

    #[ORM\ManyToOne(inversedBy: 'opportuniteSocieteImmeubleContacts')]
    private ?Immeuble $immeuble = null;

    #[ORM\ManyToOne(inversedBy: 'opportuniteSocieteImmeubleContacts')]
    private ?Contact $contact = null;

    #[ORM\ManyToOne(inversedBy: 'opportuniteSocieteImmeubleContacts')]
    private ?Societe $societe = null;

    #[ORM\ManyToOne(inversedBy: 'opportuniteSocieteImmeubleContacts')]
    private ?Opportunite $opportunite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOpportunite(): ?\DateTimeInterface
    {
        return $this->date_opportunite;
    }

    public function setDateOpportunite(?\DateTimeInterface $date_opportunite): self
    {
        $this->date_opportunite = $date_opportunite;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getSocieteConcernee(): ?string
    {
        return $this->societe_concernee;
    }

    public function setSocieteConcernee(string $societe_concernee): self
    {
        $this->societe_concernee = $societe_concernee;

        return $this;
    }

    public function getGerance(): ?int
    {
        return $this->gerance;
    }

    public function setGerance(int $gerance): self
    {
        $this->gerance = $gerance;

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

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getOpportunite(): ?Opportunite
    {
        return $this->opportunite;
    }

    public function setOpportunite(?Opportunite $opportunite): self
    {
        $this->opportunite = $opportunite;

        return $this;
    }
}
