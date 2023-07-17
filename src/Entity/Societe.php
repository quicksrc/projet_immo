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
    private ?int $IDSociete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateModification = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $OrigineContact = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateEditionJournal = null;

    #[ORM\Column(nullable: true)]
    private ?int $NumJAL = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Responsable = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VendeurRaisonSociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VendeurAdresse = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $VendeurCP = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $VendeurVille = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $VendeurPays = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $VendeurTelephoneSociete = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $VendeurFaxSociete = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $VendeurRCS = null;

    #[ORM\Column(nullable: true)]
    private ?float $VendeurCapital = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $VendeurNomDirigeant = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $VendeurTelPortable = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $VendeurTelPerso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VendeurEmail = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $VendeurDateNaissance = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VendeurAdresseFondsVendu = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ActiviteFdsCommerce = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateActeCession = null;

    #[ORM\Column(nullable: true)]
    private ?float $PrixVente = null;

    #[ORM\Column(nullable: true)]
    private ?float $Tresorerie = null;

    #[ORM\Column(nullable: true)]
    private ?float $ReportDeficitaire = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Immobilier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $AcheteurRaisonSociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $AcheteurAdresse = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $AcheteurCP = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $AcheteurVille = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $AcheteurPays = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $AcheteurTelephone = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $AcheteurFax = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $AcheteurRCS = null;

    #[ORM\Column(nullable: true)]
    private ?float $AcheteurCapital = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $AcheteurNomDirigeant = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $AcheteurTelPortable = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $AcheteurDateNaissance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Commentaire = null;

    #[ORM\OneToMany(mappedBy: 'IDSociete', targetEntity: Activite::class)]
    private Collection $activites;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $EtatDossier = null;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->IDSociete;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $DateCreation): self
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getDateModification(): ?\DateTimeInterface
    {
        return $this->DateModification;
    }

    public function setDateModification(?\DateTimeInterface $DateModification): self
    {
        $this->DateModification = $DateModification;

        return $this;
    }

    public function getOrigineContact(): ?string
    {
        return $this->OrigineContact;
    }

    public function setOrigineContact(?string $OrigineContact): self
    {
        $this->OrigineContact = $OrigineContact;

        return $this;
    }

    public function getDateEditionJournal(): ?\DateTimeInterface
    {
        return $this->DateEditionJournal;
    }

    public function setDateEditionJournal(?\DateTimeInterface $DateEditionJournal): self
    {
        $this->DateEditionJournal = $DateEditionJournal;

        return $this;
    }

    public function getNumJAL(): ?int
    {
        return $this->NumJAL;
    }

    public function setNumJAL(?int $NumJAL): self
    {
        $this->NumJAL = $NumJAL;

        return $this;
    }

    public function getResponsable(): ?string
    {
        return $this->Responsable;
    }

    public function setResponsable(?string $Responsable): self
    {
        $this->Responsable = $Responsable;

        return $this;
    }

    public function getVendeurRaisonSociale(): ?string
    {
        return $this->VendeurRaisonSociale;
    }

    public function setVendeurRaisonSociale(?string $VendeurRaisonSociale): self
    {
        $this->VendeurRaisonSociale = $VendeurRaisonSociale;

        return $this;
    }

    public function getVendeurAdresse(): ?string
    {
        return $this->VendeurAdresse;
    }

    public function setVendeurAdresse(?string $VendeurAdresse): self
    {
        $this->VendeurAdresse = $VendeurAdresse;

        return $this;
    }

    public function getVendeurCP(): ?string
    {
        return $this->VendeurCP;
    }

    public function setVendeurCP(?string $VendeurCP): self
    {
        $this->VendeurCP = $VendeurCP;

        return $this;
    }

    public function getVendeurVille(): ?string
    {
        return $this->VendeurVille;
    }

    public function setVendeurVille(?string $VendeurVille): self
    {
        $this->VendeurVille = $VendeurVille;

        return $this;
    }

    public function getVendeurPays(): ?string
    {
        return $this->VendeurPays;
    }

    public function setVendeurPays(?string $VendeurPays): self
    {
        $this->VendeurPays = $VendeurPays;

        return $this;
    }

    public function getVendeurTelephoneSociete(): ?string
    {
        return $this->VendeurTelephoneSociete;
    }

    public function setVendeurTelephoneSociete(?string $VendeurTelephoneSociete): self
    {
        $this->VendeurTelephoneSociete = $VendeurTelephoneSociete;

        return $this;
    }

    public function getVendeurFaxSociete(): ?string
    {
        return $this->VendeurFaxSociete;
    }

    public function setVendeurFaxSociete(?string $VendeurFaxSociete): self
    {
        $this->VendeurFaxSociete = $VendeurFaxSociete;

        return $this;
    }

    public function getVendeurRCS(): ?string
    {
        return $this->VendeurRCS;
    }

    public function setVendeurRCS(?string $VendeurRCS): self
    {
        $this->VendeurRCS = $VendeurRCS;

        return $this;
    }

    public function getVendeurCapital(): ?float
    {
        return $this->VendeurCapital;
    }

    public function setVendeurCapital(?float $VendeurCapital): self
    {
        $this->VendeurCapital = $VendeurCapital;

        return $this;
    }

    public function getVendeurNomDirigeant(): ?string
    {
        return $this->VendeurNomDirigeant;
    }

    public function setVendeurNomDirigeant(?string $VendeurNomDirigeant): self
    {
        $this->VendeurNomDirigeant = $VendeurNomDirigeant;

        return $this;
    }

    public function getVendeurTelPortable(): ?string
    {
        return $this->VendeurTelPortable;
    }

    public function setVendeurTelPortable(?string $VendeurTelPortable): self
    {
        $this->VendeurTelPortable = $VendeurTelPortable;

        return $this;
    }

    public function getVendeurTelPerso(): ?string
    {
        return $this->VendeurTelPerso;
    }

    public function setVendeurTelPerso(?string $VendeurTelPerso): self
    {
        $this->VendeurTelPerso = $VendeurTelPerso;

        return $this;
    }

    public function getVendeurEmail(): ?string
    {
        return $this->VendeurEmail;
    }

    public function setVendeurEmail(?string $VendeurEmail): self
    {
        $this->VendeurEmail = $VendeurEmail;

        return $this;
    }

    public function getVendeurDateNaissance(): ?\DateTimeInterface
    {
        return $this->VendeurDateNaissance;
    }

    public function setVendeurDateNaissance(?\DateTimeInterface $VendeurDateNaissance): self
    {
        $this->VendeurDateNaissance = $VendeurDateNaissance;

        return $this;
    }

    public function getVendeurAdresseFondsVendu(): ?string
    {
        return $this->VendeurAdresseFondsVendu;
    }

    public function setVendeurAdresseFondsVendu(?string $VendeurAdresseFondsVendu): self
    {
        $this->VendeurAdresseFondsVendu = $VendeurAdresseFondsVendu;

        return $this;
    }

    public function getActiviteFdsCommerce(): ?string
    {
        return $this->ActiviteFdsCommerce;
    }

    public function setActiviteFdsCommerce(?string $ActiviteFdsCommerce): self
    {
        $this->ActiviteFdsCommerce = $ActiviteFdsCommerce;

        return $this;
    }

    public function getDateActeCession(): ?\DateTimeInterface
    {
        return $this->DateActeCession;
    }

    public function setDateActeCession(?\DateTimeInterface $DateActeCession): self
    {
        $this->DateActeCession = $DateActeCession;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->PrixVente;
    }

    public function setPrixVente(?float $PrixVente): self
    {
        $this->PrixVente = $PrixVente;

        return $this;
    }

    public function getTresorerie(): ?float
    {
        return $this->Tresorerie;
    }

    public function setTresorerie(?float $Tresorerie): self
    {
        $this->Tresorerie = $Tresorerie;

        return $this;
    }

    public function getReportDeficitaire(): ?float
    {
        return $this->ReportDeficitaire;
    }

    public function setReportDeficitaire(?float $ReportDeficitaire): self
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

    public function getAcheteurRaisonSociale(): ?string
    {
        return $this->AcheteurRaisonSociale;
    }

    public function setAcheteurRaisonSociale(?string $AcheteurRaisonSociale): self
    {
        $this->AcheteurRaisonSociale = $AcheteurRaisonSociale;

        return $this;
    }

    public function getAcheteurAdresse(): ?string
    {
        return $this->AcheteurAdresse;
    }

    public function setAcheteurAdresse(?string $AcheteurAdresse): self
    {
        $this->AcheteurAdresse = $AcheteurAdresse;

        return $this;
    }

    public function getAcheteurCP(): ?string
    {
        return $this->AcheteurCP;
    }

    public function setAcheteurCP(?string $AcheteurCP): self
    {
        $this->AcheteurCP = $AcheteurCP;

        return $this;
    }

    public function getAcheteurVille(): ?string
    {
        return $this->AcheteurVille;
    }

    public function setAcheteurVille(?string $AcheteurVille): self
    {
        $this->AcheteurVille = $AcheteurVille;

        return $this;
    }

    public function getAcheteurPays(): ?string
    {
        return $this->AcheteurPays;
    }

    public function setAcheteurPays(?string $AcheteurPays): self
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

    public function setAcheteurCapital(?float $AcheteurCapital): self
    {
        $this->AcheteurCapital = $AcheteurCapital;

        return $this;
    }

    public function getAcheteurNomDirigeant(): ?string
    {
        return $this->AcheteurNomDirigeant;
    }

    public function setAcheteurNomDirigeant(?string $AcheteurNomDirigeant): self
    {
        $this->AcheteurNomDirigeant = $AcheteurNomDirigeant;

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

    public function setAcheteurDateNaissance(?\DateTimeInterface $AcheteurDateNaissance): self
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

    /**
     * @return Collection<int, Activite>
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites->add($activite);
            $activite->setIDSociete($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->removeElement($activite)) {
            // set the owning side to null (unless already changed)
            if ($activite->getIDSociete() === $this) {
                $activite->setIDSociete(null);
            }
        }

        return $this;
    }

    public function getEtatDossier(): ?string
    {
        return $this->EtatDossier;
    }

    public function setEtatDossier(?string $EtatDossier): self
    {
        $this->EtatDossier = $EtatDossier;

        return $this;
    }
}
