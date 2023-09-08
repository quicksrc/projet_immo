<?php

namespace App\Entity;

use App\Repository\TypeVoieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeVoieRepository::class)]
class TypeVoie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDTypeVoie = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Libelle = null;

    public function getIDTypeVoie(): ?int
    {
        return $this->IDTypeVoie;
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
