<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]
class Activite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $IDActivite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateActivite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Theme = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Action = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomFichier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Icone = null;

    #[ORM\ManyToOne(targetEntity: "Immeuble", inversedBy: 'activites')]
    #[ORM\JoinColumn(name: "IDImmeuble", referencedColumnName: "IDImmeuble")]
    private ?Immeuble $IDImmeuble = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(name: "IDContact", referencedColumnName: "IDContact")]
    private ?Contact $IDContact = null;

    #[ORM\ManyToOne(inversedBy: 'activites')]
    #[ORM\JoinColumn(name: "IDSociete", referencedColumnName: "IDSociete")]
    private ?Societe $IDSociete = null;

    public function getId(): ?int
    {
        return $this->IDActivite;
    }

    public function getDateActivite(): ?\DateTimeInterface
    {
        return $this->DateActivite;
    }

    public function setDateActivite(?\DateTimeInterface $DateActivite): self
    {
        $this->DateActivite = $DateActivite;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->Theme;
    }

    public function setTheme(?string $Theme): self
    {
        $this->Theme = $Theme;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->Action;
    }

    public function setAction(?string $Action): self
    {
        $this->Action = $Action;

        return $this;
    }

    public function getNomFichier(): ?string
    {
        return $this->NomFichier;
    }

    public function setNomFichier(?string $NomFichier): self
    {
        $this->NomFichier = $NomFichier;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->Icone;
    }

    public function setIcone(?string $Icone): self
    {
        $this->Icone = $Icone;

        return $this;
    }

    public function getIDImmeuble(): ?Immeuble
    {
        return $this->IDImmeuble;
    }

    public function setIDImmeuble(?Immeuble $IDImmeuble): self
    {
        $this->IDImmeuble = $IDImmeuble;

        return $this;
    }

    public function getIDContact(): ?Contact
    {
        return $this->IDContact;
    }

    public function setIDContact(?Contact $IDContact): self
    {
        $this->IDContact = $IDContact;

        return $this;
    }

    public function getIDSociete(): ?Societe
    {
        return $this->IDSociete;
    }

    public function setIDSociete(?Societe $IDSociete): self
    {
        $this->IDSociete = $IDSociete;

        return $this;
    }
}
