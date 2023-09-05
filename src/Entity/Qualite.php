<?php

namespace App\Entity;

use App\Repository\QualiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualiteRepository::class)]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDQualite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Libelle = null;

    public function getIDQualite(): ?int
    {
        return $this->IDQualite;
    }

    public function getLibelle(): ?string
    {
        return $this->Libelle;
    }

    public function setLibelle(?string $Libelle): static
    {
        $this->Libelle = $Libelle;

        return $this;
    }
}
