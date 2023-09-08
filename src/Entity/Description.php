<?php

namespace App\Entity;

use App\Repository\DescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DescriptionRepository::class)]
class Description
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDDescription = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Libelle = null;

    public function __toString()
    {
        return $this->Libelle;
    }

    public function getIDDescription(): ?int
    {
        return $this->IDDescription;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(?string $Libelle): self
    {
        $this->Libelle = $Libelle;

        return $this;
    }
}
