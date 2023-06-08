<?php

namespace App\Entity;

use App\Repository\OpportuniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpportuniteRepository::class)]
class Opportunite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\OneToMany(mappedBy: 'opportunite', targetEntity: OpportuniteSocieteImmeubleContact::class)]
    private Collection $opportuniteSocieteImmeubleContacts;

    #[ORM\ManyToMany(targetEntity: Recherche::class, mappedBy: 'opportunite')]
    private Collection $recherches;

    public function __construct()
    {
        $this->opportuniteSocieteImmeubleContacts = new ArrayCollection();
        $this->recherches = new ArrayCollection();
    }

    public function getIdOpportunite(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    /**
     * @return Collection<int, OpportuniteSocieteImmeubleContact>
     */
    public function getOpportuniteSocieteImmeubleContacts(): Collection
    {
        return $this->opportuniteSocieteImmeubleContacts;
    }

    public function addOpportuniteSocieteImmeubleContact(OpportuniteSocieteImmeubleContact $opportuniteSocieteImmeubleContact): self
    {
        if (!$this->opportuniteSocieteImmeubleContacts->contains($opportuniteSocieteImmeubleContact)) {
            $this->opportuniteSocieteImmeubleContacts->add($opportuniteSocieteImmeubleContact);
            $opportuniteSocieteImmeubleContact->setOpportunite($this);
        }

        return $this;
    }

    public function removeOpportuniteSocieteImmeubleContact(OpportuniteSocieteImmeubleContact $opportuniteSocieteImmeubleContact): self
    {
        if ($this->opportuniteSocieteImmeubleContacts->removeElement($opportuniteSocieteImmeubleContact)) {
            // set the owning side to null (unless already changed)
            if ($opportuniteSocieteImmeubleContact->getOpportunite() === $this) {
                $opportuniteSocieteImmeubleContact->setOpportunite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Recherche>
     */
    public function getRecherches(): Collection
    {
        return $this->recherches;
    }

    public function addRechercher(Recherche $recherche): self
    {
        if (!$this->recherches->contains($recherche)) {
            $this->recherches->add($recherche);
            $recherche->addOpportunite($this);
        }

        return $this;
    }

    public function removeRecherche(Recherche $recherche): self
    {
        if ($this->recherches->removeElement($recherche)) {
            $recherche->removeOpportunite($this);
        }

        return $this;
    }
}
