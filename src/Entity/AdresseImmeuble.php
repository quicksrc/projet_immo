<?php

namespace App\Entity;

use App\Repository\AdresseImmeubleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseImmeubleRepository::class)]
class AdresseImmeuble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $adresse_principale = null;

    #[ORM\OneToMany(mappedBy: 'adresseImmeuble', targetEntity: Immeuble::class)]
    private Collection $immeuble;

    #[ORM\ManyToOne(inversedBy: 'adresseImmeubles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    public function __construct()
    {
        $this->immeuble = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdressePrincipale(): ?int
    {
        return $this->adresse_principale;
    }

    public function setAdressePrincipale(int $adresse_principale): self
    {
        $this->adresse_principale = $adresse_principale;

        return $this;
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
            $immeuble->setAdresseImmeuble($this);
        }

        return $this;
    }

    public function removeImmeuble(Immeuble $immeuble): self
    {
        if ($this->immeuble->removeElement($immeuble)) {
            // set the owning side to null (unless already changed)
            if ($immeuble->getAdresseImmeuble() === $this) {
                $immeuble->setAdresseImmeuble(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }
}
