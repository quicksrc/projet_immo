<?php

namespace App\Entity;

use App\Repository\EnqueteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EnqueteRepository::class)]
class Enquete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDEnquete = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Libelle = null;

    public function getIDEnquete(): ?int
    {
        return $this->IDEnquete;
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
