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

    #[ORM\OneToMany(mappedBy: 'adresse_id', targetEntity: Contact::class)]
    private Collection $contacts;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: AdresseImmeuble::class)]
    private Collection $adresseImmeubles;

    #[ORM\OneToMany(mappedBy: 'adresse', targetEntity: Societe::class)]
    private Collection $societes;

    public function __construct()
    {
        $this->vendeurSocietes = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->adresseImmeubles = new ArrayCollection();
        $this->societes = new ArrayCollection();
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

    /**
     * @return Collection<int, Contact>
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts->add($contact);
            $contact->setAdresse($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getAdresse() === $this) {
                $contact->setAdresse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, AdresseImmeuble>
     */
    public function getAdresseImmeubles(): Collection
    {
        return $this->adresseImmeubles;
    }

    public function addAdresseImmeuble(AdresseImmeuble $adresseImmeuble): self
    {
        if (!$this->adresseImmeubles->contains($adresseImmeuble)) {
            $this->adresseImmeubles->add($adresseImmeuble);
            $adresseImmeuble->setAdresse($this);
        }

        return $this;
    }

    public function removeAdresseImmeuble(AdresseImmeuble $adresseImmeuble): self
    {
        if ($this->adresseImmeubles->removeElement($adresseImmeuble)) {
            // set the owning side to null (unless already changed)
            if ($adresseImmeuble->getAdresse() === $this) {
                $adresseImmeuble->setAdresse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Societe>
     */
    public function getSocietes(): Collection
    {
        return $this->societes;
    }

    public function addSociete(Societe $societe): self
    {
        if (!$this->societes->contains($societe)) {
            $this->societes->add($societe);
            $societe->setAdresse($this);
        }

        return $this;
    }

    public function removeSociete(Societe $societe): self
    {
        if ($this->societes->removeElement($societe)) {
            // set the owning side to null (unless already changed)
            if ($societe->getAdresse() === $this) {
                $societe->setAdresse(null);
            }
        }

        return $this;
    }
}
