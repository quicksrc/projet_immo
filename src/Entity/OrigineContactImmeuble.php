<?php

namespace App\Entity;

use App\Repository\OrigineContactImmeubleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrigineContactImmeubleRepository::class)]
class OrigineContactImmeuble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDOrigineContactImmeuble = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Libelle = null;

    public function getId(): ?int
    {
        return $this->IDOrigineContactImmeuble;
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
