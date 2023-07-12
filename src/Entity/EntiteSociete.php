<?php

namespace App\Entity;

use App\Repository\EntiteSocieteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntiteSocieteRepository::class)]
class EntiteSociete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDEntiteSociete = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Libelle = null;

    public function getId(): ?int
    {
        return $this->IDEntiteSociete;
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
