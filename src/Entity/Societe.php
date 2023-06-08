<?php

namespace App\Entity;

use App\Repository\SocieteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocieteRepository::class)]
class Societe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateModification = null;

    #[ORM\Column(length: 200)]
    private ?string $EtatDossier = null;

    #[ORM\Column(length: 200)]
    private ?string $OrigineContact = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateEditionJournal = null;

    #[ORM\Column]
    private ?int $NumJAL = null;

    #[ORM\Column(length: 200)]
    private ?string $Responsable = null;

    #[ORM\Column(length: 200)]
    private ?string $ActiviteFdsCommerce = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateActCession = null;

    #[ORM\Column]
    private ?float $PrixVente = null;

    #[ORM\Column]
    private ?float $Tresorerie = null;

    #[ORM\Column]
    private ?float $ReportDeficitaire = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Immobilier = null;

    #[ORM\Column(length: 510)]
    private ?string $AcheteurRaisonSoc = null;

    #[ORM\Column(length: 510)]
    private ?string $AcheteurAdresse = null;

    #[ORM\Column(length: 40)]
    private ?string $AcheteurCP = null;

    #[ORM\Column(length: 200)]
    private ?string $AcheteurVille = null;

    #[ORM\Column(length: 200)]
    private ?string $AcheteurPays = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $AcheteurTelephone = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $AcheteurFax = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $AcheteurRCS = null;

    #[ORM\Column]
    private ?float $AcheteurCapital = null;

    #[ORM\Column(length: 200)]
    private ?string $AcheteurNomDirige = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $AcheteurTelPortable = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $AcheteurDateNaissance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\ManyToOne(inversedBy: 'societes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $adresse = null;

    #[ORM\OneToMany(mappedBy: 'societe', targetEntity: SocieteContact::class)]
    private Collection $societeContacts;

    #[ORM\OneToMany(mappedBy: 'societe', targetEntity: OpportuniteSocieteImmeubleContact::class)]
    private Collection $opportuniteSocieteImmeubleContacts;

    #[ORM\ManyToMany(targetEntity: Recherche::class, mappedBy: 'societe')]
    private Collection $recherches;

    #[ORM\ManyToMany(targetEntity: ActiviteImmeubleContactSociete::class, mappedBy: 'societe')]
    private Collection $activiteImmeubleContactSocietes;

    public function __construct()
    {
        $this->societeContacts = new ArrayCollection();
        $this->opportuniteSocieteImmeubleContacts = new ArrayCollection();
        $this->recherches = new ArrayCollection();
        $this->activiteImmeubleContactSocietes = new ArrayCollection();
    }

    public function getIDSociete(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): self
    {
        $this->DateCreation = $DateCreation;

        return $this;
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

    public function getEtatDossier(): ?string
    {
        return $this->EtatDossier;
    }

    public function setEtatDossier(string $EtatDossier): self
    {
        $this->EtatDossier = $EtatDossier;

        return $this;
    }

    public function getOrigineContact(): ?string
    {
        return $this->OrigineContact;
    }

    public function setOrigineContact(string $OrigineContact): self
    {
        $this->OrigineContact = $OrigineContact;

        return $this;
    }

    public function getDateEditionJournal(): ?\DateTimeInterface
    {
        return $this->DateEditionJournal;
    }

    public function setDateEditionJournal(\DateTimeInterface $DateEditionJournal): self
    {
        $this->DateEditionJournal = $DateEditionJournal;

        return $this;
    }

    public function getNumJAL(): ?int
    {
        return $this->NumJAL;
    }

    public function setNumJAL(int $NumJAL): self
    {
        $this->NumJAL = $NumJAL;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->Responsable;
    }

    public function setResponsable(string $Responsable): self
    {
        $this->Responsable = $Responsable;

        return $this;
    }

    public function getActiviteFdsCommerce(): ?string
    {
        return $this->ActiviteFdsCommerce;
    }

    public function setActiviteFdsCommerce(string $ActiviteFdsCommerce): self
    {
        $this->ActiviteFdsCommerce = $ActiviteFdsCommerce;

        return $this;
    }

    public function getDateActCession(): ?\DateTimeInterface
    {
        return $this->DateActCession;
    }

    public function setDateActCession(?\DateTimeInterface $DateActCession): self
    {
        $this->DateActCession = $DateActCession;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->PrixVente;
    }

    public function setPrixVente(float $PrixVente): self
    {
        $this->PrixVente = $PrixVente;

        return $this;
    }

    public function getTresorerie(): ?float
    {
        return $this->Tresorerie;
    }

    public function setTresorerie(float $Tresorerie): self
    {
        $this->Tresorerie = $Tresorerie;

        return $this;
    }

    public function getReportDeficitaire(): ?float
    {
        return $this->ReportDeficitaire;
    }

    public function setReportDeficitaire(float $ReportDeficitaire): self
    {
        $this->ReportDeficitaire = $ReportDeficitaire;

        return $this;
    }

    public function getImmobilier(): ?string
    {
        return $this->Immobilier;
    }

    public function setImmobilier(?string $Immobilier): self
    {
        $this->Immobilier = $Immobilier;

        return $this;
    }

    public function getAcheteurRaisonSoc(): ?string
    {
        return $this->AcheteurRaisonSoc;
    }

    public function setAcheteurRaisonSoc(string $AcheteurRaisonSoc): self
    {
        $this->AcheteurRaisonSoc = $AcheteurRaisonSoc;

        return $this;
    }

    public function getAcheteurAdresse(): ?string
    {
        return $this->AcheteurAdresse;
    }

    public function setAcheteurAdresse(string $AcheteurAdresse): self
    {
        $this->AcheteurAdresse = $AcheteurAdresse;

        return $this;
    }

    public function getAcheteurCP(): ?string
    {
        return $this->AcheteurCP;
    }

    public function setAcheteurCP(string $AcheteurCP): self
    {
        $this->AcheteurCP = $AcheteurCP;

        return $this;
    }

    public function getAcheteurVille(): ?string
    {
        return $this->AcheteurVille;
    }

    public function setAcheteurVille(string $AcheteurVille): self
    {
        $this->AcheteurVille = $AcheteurVille;

        return $this;
    }

    public function getAcheteurPays(): ?string
    {
        return $this->AcheteurPays;
    }

    public function setAcheteurPays(string $AcheteurPays): self
    {
        $this->AcheteurPays = $AcheteurPays;

        return $this;
    }

    public function getAcheteurTelephone(): ?string
    {
        return $this->AcheteurTelephone;
    }

    public function setAcheteurTelephone(?string $AcheteurTelephone): self
    {
        $this->AcheteurTelephone = $AcheteurTelephone;

        return $this;
    }

    public function getAcheteurFax(): ?string
    {
        return $this->AcheteurFax;
    }

    public function setAcheteurFax(?string $AcheteurFax): self
    {
        $this->AcheteurFax = $AcheteurFax;

        return $this;
    }

    public function getAcheteurRCS(): ?string
    {
        return $this->AcheteurRCS;
    }

    public function setAcheteurRCS(?string $AcheteurRCS): self
    {
        $this->AcheteurRCS = $AcheteurRCS;

        return $this;
    }

    public function getAcheteurCapital(): ?float
    {
        return $this->AcheteurCapital;
    }

    public function setAcheteurCapital(float $AcheteurCapital): self
    {
        $this->AcheteurCapital = $AcheteurCapital;

        return $this;
    }

    public function getAcheteurNomDirige(): ?string
    {
        return $this->AcheteurNomDirige;
    }

    public function setAcheteurNomDirige(string $AcheteurNomDirige): self
    {
        $this->AcheteurNomDirige = $AcheteurNomDirige;

        return $this;
    }

    public function getAcheteurTelPortable(): ?string
    {
        return $this->AcheteurTelPortable;
    }

    public function setAcheteurTelPortable(?string $AcheteurTelPortable): self
    {
        $this->AcheteurTelPortable = $AcheteurTelPortable;

        return $this;
    }

    public function getAcheteurDateNaissance(): ?\DateTimeInterface
    {
        return $this->AcheteurDateNaissance;
    }

    public function setAcheteurDateNaissance(\DateTimeInterface $AcheteurDateNaissance): self
    {
        $this->AcheteurDateNaissance = $AcheteurDateNaissance;

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

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

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
            $societeContact->setSociete($this);
        }

        return $this;
    }

    public function removeSocieteContact(SocieteContact $societeContact): self
    {
        if ($this->societeContacts->removeElement($societeContact)) {
            // set the owning side to null (unless already changed)
            if ($societeContact->getSociete() === $this) {
                $societeContact->setSociete(null);
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
            $opportuniteSocieteImmeubleContact->setSociete($this);
        }

        return $this;
    }

    public function removeOpportuniteSocieteImmeubleContact(OpportuniteSocieteImmeubleContact $opportuniteSocieteImmeubleContact): self
    {
        if ($this->opportuniteSocieteImmeubleContacts->removeElement($opportuniteSocieteImmeubleContact)) {
            // set the owning side to null (unless already changed)
            if ($opportuniteSocieteImmeubleContact->getSociete() === $this) {
                $opportuniteSocieteImmeubleContact->setSociete(null);
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
            $recherche->addSociete($this);
        }

        return $this;
    }

    public function removeRecherche(Recherche $recherche): self
    {
        if ($this->recherches->removeElement($recherche)) {
            $recherche->removeSociete($this);
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
            $activiteImmeubleContactSociete->addSociete($this);
        }

        return $this;
    }

    public function removeActiviteImmeubleContactSociete(ActiviteImmeubleContactSociete $activiteImmeubleContactSociete): self
    {
        if ($this->activiteImmeubleContactSocietes->removeElement($activiteImmeubleContactSociete)) {
            $activiteImmeubleContactSociete->removeSociete($this);
        }

        return $this;
    }
}
