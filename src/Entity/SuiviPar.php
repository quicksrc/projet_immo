<?php

namespace App\Entity;

use App\Repository\SuiviParRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiviParRepository::class)]
class SuiviPar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDSuiviPar = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Libelle = null;

    public function getIDSuiviPar(): ?int
    {
        return $this->IDSuiviPar;
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
