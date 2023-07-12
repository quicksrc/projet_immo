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

    public function getId(): ?int
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
}
