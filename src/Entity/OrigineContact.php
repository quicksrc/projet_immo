<?php

namespace App\Entity;

use App\Repository\OrigineContactRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrigineContactRepository::class)]
class OrigineContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDOrigineContact = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Libelle = null;

    public function getId(): ?int
    {
        return $this->IDOrigineContact;
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
