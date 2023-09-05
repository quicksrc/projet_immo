<?php

namespace App\Entity;

use App\Repository\QualiteProprietaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualiteProprietaireRepository::class)]
class QualiteProprietaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDQualiteProprietaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Libelle = null;

    public function getIDQualiteProprietaire(): ?int
    {
        return $this->IDQualiteProprietaire;
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
