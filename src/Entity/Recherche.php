<?php

namespace App\Entity;

use App\Repository\RechercheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RechercheRepository::class)]
class Recherche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'recherche', targetEntity: Immeuble::class)]
    private Collection $immeuble;

    #[ORM\ManyToMany(targetEntity: Contact::class, inversedBy: 'recherches')]
    private Collection $contact;

    #[ORM\ManyToMany(targetEntity: Societe::class, inversedBy: 'recherches')]
    private Collection $societe;

    #[ORM\ManyToMany(targetEntity: Activite::class, inversedBy: 'recherches')]
    private Collection $activite;

    #[ORM\ManyToOne(inversedBy: 'recherches')]
    private ?User $user = null;

    #[ORM\ManyToMany(targetEntity: Opportunite::class, inversedBy: 'recherches')]
    private Collection $opportunite;

    public function __construct()
    {
        $this->immeuble = new ArrayCollection();
        $this->contact = new ArrayCollection();
        $this->societe = new ArrayCollection();
        $this->activite = new ArrayCollection();
        $this->opportunite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Immeuble>
     */
    public function getImmeuble(): Collection
    {
        return $this->immeuble;
    }

    public function addImmeuble(Immeuble $immeuble): self
    {
        if (!$this->immeuble->contains($immeuble)) {
            $this->immeuble->add($immeuble);
            $immeuble->setRecherche($this);
        }

        return $this;
    }

    public function removeImmeuble(Immeuble $immeuble): self
    {
        if ($this->immeuble->removeElement($immeuble)) {
            // set the owning side to null (unless already changed)
            if ($immeuble->getRecherche() === $this) {
                $immeuble->setRecherche(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Contact>
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contact->contains($contact)) {
            $this->contact->add($contact);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        $this->contact->removeElement($contact);

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

    /**
     * @return Collection<int, Activite>
     */
    public function getActivite(): Collection
    {
        return $this->activite;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activite->contains($activite)) {
            $this->activite->add($activite);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        $this->activite->removeElement($activite);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Opportunite>
     */
    public function getOpportunite(): Collection
    {
        return $this->opportunite;
    }

    public function addOpportunite(Opportunite $opportunite): self
    {
        if (!$this->opportunite->contains($opportunite)) {
            $this->opportunite->add($opportunite);
        }

        return $this;
    }

    public function removeOpportunite(Opportunite $opportunite): self
    {
        $this->opportunite->removeElement($opportunite);

        return $this;
    }
}
