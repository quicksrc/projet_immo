<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $NumPrincipal = null;

    #[ORM\Column(length: 20)]
    private ?string $NumSecondaire = null;

    #[ORM\Column(length: 40)]
    private ?string $TypeVoie = null;

    #[ORM\Column(length: 510)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 40)]
    private ?string $CP = null;

    #[ORM\Column(length: 200)]
    private ?string $Ville = null;

    #[ORM\Column(length: 200)]
    private ?string $Pays = null;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: VendeurSociete::class)]
    #[ORM\JoinTable(name: 'adresse')]
    private Collection $vendeurSocietes;

    public function __construct()
    {
        $this->vendeurSocietes = new ArrayCollection();
    }

    public function getIDAdresse(): ?int
    {
        return $this->id;
    }

    public function getNumPrincipal(): ?string
    {
        return $this->NumPrincipal;
    }

    public function setNumPrincipal(string $NumPrincipal): self
    {
        $this->NumPrincipal = $NumPrincipal;

        return $this;
    }

    public function getNumSecondaire(): ?string
    {
        return $this->NumSecondaire;
    }

    public function setNumSecondaire(string $NumSecondaire): self
    {
        $this->NumSecondaire = $NumSecondaire;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->TypeVoie;
    }

    public function setTypeVoie(string $TypeVoie): self
    {
        $this->TypeVoie = $TypeVoie;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(string $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    /**
     * @return Collection<int, VendeurSociete>
     */
    public function getVendeurSocietes(): Collection
    {
        return $this->vendeurSocietes;
    }

    public function addVendeurSociete(VendeurSociete $vendeurSociete): self
    {
        if (!$this->vendeurSocietes->contains($vendeurSociete)) {
            $this->vendeurSocietes->add($vendeurSociete);
            $vendeurSociete->setAdresse($this);
        }

        return $this;
    }

    public function removeVendeurSociete(VendeurSociete $vendeurSociete): self
    {
        if ($this->vendeurSocietes->removeElement($vendeurSociete)) {
            // set the owning side to null (unless already changed)
            if ($vendeurSociete->getAdresse() === $this) {
                $vendeurSociete->setAdresse(null);
            }
        }

        return $this;
    }
}
