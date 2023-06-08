<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]
class Activite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $theme = null;

    #[ORM\ManyToMany(targetEntity: Recherche::class, mappedBy: 'activite')]
    private Collection $recherches;

    #[ORM\OneToMany(mappedBy: 'activite', targetEntity: ActiviteImmeubleContactSociete::class)]
    private Collection $activiteImmeubleContactSocietes;

    public function __construct()
    {
        $this->recherches = new ArrayCollection();
        $this->activiteImmeubleContactSocietes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection<int, Rechercher>
     */
    public function getRecherchers(): Collection
    {
        return $this->recherches;
    }

    public function addRechercher(Recherche $recherche): self
    {
        if (!$this->recherches->contains($recherche)) {
            $this->recherches->add($recherche);
            $recherche->addActivite($this);
        }

        return $this;
    }

    public function removeRechercher(Recherche $recherche): self
    {
        if ($this->recherches->removeElement($recherche)) {
            $recherche->removeActivite($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ActiviteImmeubleContactSociete>
     */
    public function getActiviteImmeubleContactSocietes(): Collection
    {
        return $this->activiteImmeubleContactSocietes;
    }

    public function addActiviteImmeubleContactSociete(ActiviteImmeubleContactSociete $activiteImmeubleContactSociete): self
    {
        if (!$this->activiteImmeubleContactSocietes->contains($activiteImmeubleContactSociete)) {
            $this->activiteImmeubleContactSocietes->add($activiteImmeubleContactSociete);
            $activiteImmeubleContactSociete->setActivite($this);
        }

        return $this;
    }

    public function removeActiviteImmeubleContactSociete(ActiviteImmeubleContactSociete $activiteImmeubleContactSociete): self
    {
        if ($this->activiteImmeubleContactSocietes->removeElement($activiteImmeubleContactSociete)) {
            // set the owning side to null (unless already changed)
            if ($activiteImmeubleContactSociete->getActivite() === $this) {
                $activiteImmeubleContactSociete->setActivite(null);
            }
        }

        return $this;
    }
}
