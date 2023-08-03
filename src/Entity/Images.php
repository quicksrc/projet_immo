<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\ManyToOne(targetEntity: "Immeuble", inversedBy: 'images')]
    #[ORM\JoinColumn(name: "IDImmeuble", referencedColumnName: "idimmeuble")]
    private ?Immeuble $immeubles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImmeubles(): ?Immeuble
    {
        return $this->immeubles;
    }

    public function setImmeubles(?Immeuble $immeubles): self
    {
        $this->immeubles = $immeubles;

        return $this;
    }
}
