<?php

namespace App\Entity;

use App\Repository\ActiviteImmeubleContactSocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteImmeubleContactSocieteRepository::class)]
class ActiviteImmeubleContactSociete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_activite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column(length: 200)]
    private ?string $action = null;

    #[ORM\Column(length: 510, nullable: true)]
    private ?string $nom_fichier = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $icone = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Immeuble $immeuble = null;

    #[ORM\ManyToOne(inversedBy: 'activiteImmeubleContactSocietes')]
    private ?Contact $contact = null;

    #[ORM\ManyToMany(targetEntity: Societe::class, inversedBy: 'activiteImmeubleContactSocietes')]
    private Collection $societe;

    #[ORM\ManyToOne(inversedBy: 'activiteImmeubleContactSocietes')]
    private ?Activite $activite = null;

    public function __construct()
    {
        $this->societe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateActivite(): ?\DateTimeInterface
    {
        return $this->date_activite;
    }

    public function setDateActivite(\DateTimeInterface $date_activite): self
    {
        $this->date_activite = $date_activite;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getNomFichier(): ?string
    {
        return $this->nom_fichier;
    }

    public function setNomFichier(?string $nom_fichier): self
    {
        $this->nom_fichier = $nom_fichier;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): self
    {
        $this->icone = $icone;

        return $this;
    }

    public function getImmeuble(): ?Immeuble
    {
        return $this->immeuble;
    }

    public function setImmeuble(?Immeuble $immeuble): self
    {
        $this->immeuble = $immeuble;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection<int, Societe>
     */
    public function getSociete(): Collection
    {
        return $this->societe;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->societe->contains($societe)) {
            $this->societe->add($societe);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        $this->societe->removeElement($societe);

        return $this;
    }

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }
}
