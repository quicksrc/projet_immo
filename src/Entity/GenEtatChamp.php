<?php

namespace App\Entity;

use App\Repository\GenEtatChampRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenEtatChampRepository::class)]
class GenEtatChamp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDGenEtatChamp = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ChampSQL = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $TableSQL = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Tri = null;

    #[ORM\Column(length: 3, nullable: true)]
    private ?string $Afficher = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Critere1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Critere2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Critere3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Critere4 = null;

    #[ORM\Column(nullable: true)]
    private ?int $TailleColonne = null;

    #[ORM\Column(nullable: true)]
    private ?int $Ordre = null;

    public function getId(): ?int
    {
        return $this->IDGenEtatChamp;
    }

    public function getChampSQL(): ?string
    {
        return $this->ChampSQL;
    }

    public function setChampSQL(?string $ChampSQL): self
    {
        $this->ChampSQL = $ChampSQL;

        return $this;
    }

    public function getTableSQL(): ?string
    {
        return $this->TableSQL;
    }

    public function setTableSQL(?string $TableSQL): self
    {
        $this->TableSQL = $TableSQL;

        return $this;
    }

    public function getTri(): ?string
    {
        return $this->Tri;
    }

    public function setTri(?string $Tri): self
    {
        $this->Tri = $Tri;

        return $this;
    }

    public function getAfficher(): ?string
    {
        return $this->Afficher;
    }

    public function setAfficher(?string $Afficher): self
    {
        $this->Afficher = $Afficher;

        return $this;
    }

    public function getCritere1(): ?string
    {
        return $this->Critere1;
    }

    public function setCritere1(?string $Critere1): self
    {
        $this->Critere1 = $Critere1;

        return $this;
    }

    public function getCritere2(): ?string
    {
        return $this->Critere2;
    }

    public function setCritere2(?string $Critere2): self
    {
        $this->Critere2 = $Critere2;

        return $this;
    }

    public function getCritere3(): ?string
    {
        return $this->Critere3;
    }

    public function setCritere3(?string $Critere3): self
    {
        $this->Critere3 = $Critere3;

        return $this;
    }

    public function getCritere4(): ?string
    {
        return $this->Critere4;
    }

    public function setCritere4(?string $Critere4): self
    {
        $this->Critere4 = $Critere4;

        return $this;
    }

    public function getTailleColonne(): ?float
    {
        return $this->TailleColonne;
    }

    public function setTailleColonne(?float $TailleColonne): self
    {
        $this->TailleColonne = $TailleColonne;

        return $this;
    }

    public function getOrdre(): ?int
    {
        return $this->Ordre;
    }

    public function setOrdre(?int $Ordre): self
    {
        $this->Ordre = $Ordre;

        return $this;
    }
}
