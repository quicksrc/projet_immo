<?php

namespace App\Entity;

use App\Repository\ActiviteSocieteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteSocieteRepository::class)]
class ActiviteSociete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDActiviteSociete = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Libelle = null;

    public function getId(): ?int
    {
        return $this->IDActiviteSociete;
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
