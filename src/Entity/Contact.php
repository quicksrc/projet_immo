<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateModification = null;

    #[ORM\Column(length: 200)]
    private ?string $Civilite = null;

    #[ORM\Column(length: 510)]
    private ?string $Nom = null;

    #[ORM\Column(length: 510)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 510)]
    private ?string $Societe = null;

    #[ORM\Column(length: 510)]
    private ?string $Correspondant = null;

    #[ORM\Column(length: 40)]
    private ?string $Telephone = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $Fax = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $TelephonePortable = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $TelephoneDomicile = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $ListeRouge = null;

    #[ORM\Column(length: 510)]
    private ?string $Email = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateNaissance = null;

    #[ORM\Column(length: 200)]
    private ?string $Activite = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $RCS = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $AntiMailing = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $NPAI = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\Column(length: 510)]
    private ?string $Fonction = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $DCD = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    #[ORM\ManyToOne(inversedBy: 'contacts')]
    private ?TypeContact $typecontact = null;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: SocieteContact::class)]
    private Collection $societeContacts;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: OpportuniteSocieteImmeubleContact::class)]
    private Collection $opportuniteSocieteImmeubleContacts;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: ImmeubleContact::class)]
    private Collection $immeubleContacts;

    #[ORM\ManyToMany(targetEntity: Recherche::class, mappedBy: 'contact')]
    private Collection $recherches;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: ActiviteImmeubleContactSociete::class)]
    private Collection $activiteImmeubleContactSocietes;

    public function __construct()
    {
        $this->societeContacts = new ArrayCollection();
        $this->opportuniteSocieteImmeubleContacts = new ArrayCollection();
        $this->immeubleContacts = new ArrayCollection();
        $this->recherches = new ArrayCollection();
        $this->activiteImmeubleContactSocietes = new ArrayCollection();
    }

    public function getIDContact(): ?int
    {
        return $this->id;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->DateModification;
    }

    public function setDateModification(\DateTimeInterface $DateModification): self
    {
        $this->DateModification = $DateModification;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->Civilite;
    }

    public function setCivilite(string $Civilite): self
    {
        $this->Civilite = $Civilite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->Societe;
    }

    public function setSociete(string $Societe): self
    {
        $this->Societe = $Societe;

        return $this;
    }

    public function getCorrespondant(): ?string
    {
        return $this->Correspondant;
    }

    public function setCorrespondant(string $Correspondant): self
    {
        $this->Correspondant = $Correspondant;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->Fax;
    }

    public function setFax(?string $Fax): self
    {
        $this->Fax = $Fax;

        return $this;
    }

    public function getTelephonePortable(): ?string
    {
        return $this->TelephonePortable;
    }

    public function setTelephonePortable(?string $TelephonePortable): self
    {
        $this->TelephonePortable = $TelephonePortable;

        return $this;
    }

    public function getTelephoneDomicile(): ?string
    {
        return $this->TelephoneDomicile;
    }

    public function setTelephoneDomicile(?string $TelephoneDomicile): self
    {
        $this->TelephoneDomicile = $TelephoneDomicile;

        return $this;
    }

    public function getListeRouge(): ?int
    {
        return $this->ListeRouge;
    }

    public function setListeRouge(int $ListeRouge): self
    {
        $this->ListeRouge = $ListeRouge;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->Activite;
    }

    public function setActivite(string $Activite): self
    {
        $this->Activite = $Activite;

        return $this;
    }

    public function getRCS(): ?string
    {
        return $this->RCS;
    }

    public function setRCS(?string $RCS): self
    {
        $this->RCS = $RCS;

        return $this;
    }

    public function getAntiMailing(): ?int
    {
        return $this->AntiMailing;
    }

    public function setAntiMailing(int $AntiMailing): self
    {
        $this->AntiMailing = $AntiMailing;

        return $this;
    }

    public function getNPAI(): ?int
    {
        return $this->NPAI;
    }

    public function setNPAI(int $NPAI): self
    {
        $this->NPAI = $NPAI;

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

    public function getFonction(): ?string
    {
        return $this->Fonction;
    }

    public function setFonction(string $Fonction): self
    {
        $this->Fonction = $Fonction;

        return $this;
    }

    public function getDCD(): ?int
    {
        return $this->DCD;
    }

    public function setDCD(int $DCD): self
    {
        $this->DCD = $DCD;

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

    public function getTypecontact(): ?TypeContact
    {
        return $this->typecontact;
    }

    public function setTypecontact(?TypeContact $typecontact): self
    {
        $this->typecontact = $typecontact;

        return $this;
    }

    /**
     * @return Collection<int, SocieteContact>
     */
    public function getSocieteContacts(): Collection
    {
        return $this->societeContacts;
    }

    public function addSocieteContact(SocieteContact $societeContact): self
    {
        if (!$this->societeContacts->contains($societeContact)) {
            $this->societeContacts->add($societeContact);
            $societeContact->setContact($this);
        }

        return $this;
    }

    public function removeSocieteContact(SocieteContact $societeContact): self
    {
        if ($this->societeContacts->removeElement($societeContact)) {
            // set the owning side to null (unless already changed)
            if ($societeContact->getContact() === $this) {
                $societeContact->setContact(null);
            }
        }

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
            $opportuniteSocieteImmeubleContact->setContact($this);
        }

        return $this;
    }

    public function removeOpportuniteSocieteImmeubleContact(OpportuniteSocieteImmeubleContact $opportuniteSocieteImmeubleContact): self
    {
        if ($this->opportuniteSocieteImmeubleContacts->removeElement($opportuniteSocieteImmeubleContact)) {
            // set the owning side to null (unless already changed)
            if ($opportuniteSocieteImmeubleContact->getContact() === $this) {
                $opportuniteSocieteImmeubleContact->setContact(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ImmeubleContact>
     */
    public function getImmeubleContacts(): Collection
    {
        return $this->immeubleContacts;
    }

    public function addImmeubleContact(ImmeubleContact $immeubleContact): self
    {
        if (!$this->immeubleContacts->contains($immeubleContact)) {
            $this->immeubleContacts->add($immeubleContact);
            $immeubleContact->setContact($this);
        }

        return $this;
    }

    public function removeImmeubleContact(ImmeubleContact $immeubleContact): self
    {
        if ($this->immeubleContacts->removeElement($immeubleContact)) {
            // set the owning side to null (unless already changed)
            if ($immeubleContact->getContact() === $this) {
                $immeubleContact->setContact(null);
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

    public function addRecherche(Recherche $recherche): self
    {
        if (!$this->recherches->contains($recherche)) {
            $this->recherches->add($recherche);
            $recherche->addContact($this);
        }

        return $this;
    }

    public function removeRecherche(Recherche $recherche): self
    {
        if ($this->recherches->removeElement($recherche)) {
            $recherche->removeContact($this);
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
            $activiteImmeubleContactSociete->setContact($this);
        }

        return $this;
    }

    public function removeActiviteImmeubleContactSociete(ActiviteImmeubleContactSociete $activiteImmeubleContactSociete): self
    {
        if ($this->activiteImmeubleContactSocietes->removeElement($activiteImmeubleContactSociete)) {
            // set the owning side to null (unless already changed)
            if ($activiteImmeubleContactSociete->getContact() === $this) {
                $activiteImmeubleContactSociete->setContact(null);
            }
        }

        return $this;
    }
}
