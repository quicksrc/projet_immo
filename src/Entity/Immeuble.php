<?php

namespace App\Entity;

use App\Repository\ImmeubleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmeubleRepository::class)]
class Immeuble
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateEnquete = null;

    #[ORM\Column]
    private ?int $ReferenceProprio = null;

    #[ORM\Column(length: 20)]
    private ?string $NumPlancheCadast = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $SMS = null;

    #[ORM\Column(length: 200)]
    private ?string $EtatDossier = null;

    #[ORM\Column(length: 200)]
    private ?string $Enquete = null;

    #[ORM\Column(length: 300)]
    private ?string $NomGardien = null;

    #[ORM\Column(length: 200)]
    private ?string $Description = null;

    #[ORM\Column(length: 200)]
    private ?string $SuiviPar = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Vendu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateVente = null;

    #[ORM\Column(length: 510)]
    private ?string $OrigineContact = null;

    #[ORM\Column(length: 510)]
    private ?string $Intermediaire = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $NCPCF = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $Visite = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Commentaire = null;

    #[ORM\Column(length: 200)]
    private ?string $ContactPrincipal = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateVisite = null;

    #[ORM\Column(length: 100)]
    private ?string $RegroupementAct = null;

    #[ORM\OneToMany(mappedBy: 'immeuble', targetEntity: PJ::class)]
    private Collection $PJs;

    #[ORM\ManyToOne(inversedBy: 'immeuble')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AdresseImmeuble $adresseImmeuble = null;

    #[ORM\OneToMany(mappedBy: 'immeuble', targetEntity: OpportuniteSocieteImmeubleContact::class)]
    private Collection $opportuniteSocieteImmeubleContacts;

    #[ORM\OneToMany(mappedBy: 'immeuble', targetEntity: ImmeubleContact::class)]
    private Collection $immeubleContacts;

    #[ORM\ManyToOne(inversedBy: 'immeuble')]
    private ?Recherche $recherche = null;

    public function __construct()
    {
        $this->PJs = new ArrayCollection();
        $this->opportuniteSocieteImmeubleContacts = new ArrayCollection();
        $this->immeubleContacts = new ArrayCollection();
    }

    public function getIDImmeuble(): ?int
    {
        return $this->id;
    }

    public function getDateEnquete(): ?\DateTimeInterface
    {
        return $this->DateEnquete;
    }

    public function setDateEnquete(\DateTimeInterface $DateEnquete): self
    {
        $this->DateEnquete = $DateEnquete;

        return $this;
    }

    public function getReferenceProprio(): ?int
    {
        return $this->ReferenceProprio;
    }

    public function setReferenceProprio(int $ReferenceProprio): self
    {
        $this->ReferenceProprio = $ReferenceProprio;

        return $this;
    }

    public function getNumPlancheCadast(): ?string
    {
        return $this->NumPlancheCadast;
    }

    public function setNumPlancheCadast(string $NumPlancheCadast): self
    {
        $this->NumPlancheCadast = $NumPlancheCadast;

        return $this;
    }

    public function getSMS(): ?int
    {
        return $this->SMS;
    }

    public function setSMS(int $SMS): self
    {
        $this->SMS = $SMS;

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

    public function getEnquete(): ?string
    {
        return $this->Enquete;
    }

    public function setEnquete(string $Enquete): self
    {
        $this->Enquete = $Enquete;

        return $this;
    }

    public function getNomGardien(): ?string
    {
        return $this->NomGardien;
    }

    public function setNomGardien(string $NomGardien): self
    {
        $this->NomGardien = $NomGardien;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getSuiviPar(): ?string
    {
        return $this->SuiviPar;
    }

    public function setSuiviPar(string $SuiviPar): self
    {
        $this->SuiviPar = $SuiviPar;

        return $this;
    }

    public function getVendu(): ?int
    {
        return $this->Vendu;
    }

    public function setVendu(int $Vendu): self
    {
        $this->Vendu = $Vendu;

        return $this;
    }

    public function getDateVente(): ?\DateTimeInterface
    {
        return $this->DateVente;
    }

    public function setDateVente(\DateTimeInterface $DateVente): self
    {
        $this->DateVente = $DateVente;

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

    public function getIntermediaire(): ?string
    {
        return $this->Intermediaire;
    }

    public function setIntermediaire(string $Intermediaire): self
    {
        $this->Intermediaire = $Intermediaire;

        return $this;
    }

    public function getNCPCF(): ?int
    {
        return $this->NCPCF;
    }

    public function setNCPCF(int $NCPCF): self
    {
        $this->NCPCF = $NCPCF;

        return $this;
    }

    public function getVisite(): ?int
    {
        return $this->Visite;
    }

    public function setVisite(int $Visite): self
    {
        $this->Visite = $Visite;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getContactPrincipal(): ?string
    {
        return $this->ContactPrincipal;
    }

    public function setContactPrincipal(string $ContactPrincipal): self
    {
        $this->ContactPrincipal = $ContactPrincipal;

        return $this;
    }

    public function getDateVisite(): ?\DateTimeInterface
    {
        return $this->DateVisite;
    }

    public function setDateVisite(?\DateTimeInterface $DateVisite): self
    {
        $this->DateVisite = $DateVisite;

        return $this;
    }

    public function getRegroupementAct(): ?string
    {
        return $this->RegroupementAct;
    }

    public function setRegroupementAct(string $RegroupementAct): self
    {
        $this->RegroupementAct = $RegroupementAct;

        return $this;
    }

    /**
     * @return Collection<int, PJ>
     */
    public function getPJs(): Collection
    {
        return $this->PJs;
    }

    public function addPJ(PJ $pJ): self
    {
        if (!$this->PJs->contains($pJ)) {
            $this->PJs->add($pJ);
            $pJ->setImmeuble($this);
        }

        return $this;
    }

    public function removePJ(PJ $pJ): self
    {
        if ($this->PJs->removeElement($pJ)) {
            // set the owning side to null (unless already changed)
            if ($pJ->getImmeuble() === $this) {
                $pJ->setImmeuble(null);
            }
        }

        return $this;
    }

    public function getAdresseImmeuble(): ?AdresseImmeuble
    {
        return $this->adresseImmeuble;
    }

    public function setAdresseImmeuble(?AdresseImmeuble $adresseImmeuble): self
    {
        $this->adresseImmeuble = $adresseImmeuble;

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
            $opportuniteSocieteImmeubleContact->setImmeuble($this);
        }

        return $this;
    }

    public function removeOpportuniteSocieteImmeubleContact(OpportuniteSocieteImmeubleContact $opportuniteSocieteImmeubleContact): self
    {
        if ($this->opportuniteSocieteImmeubleContacts->removeElement($opportuniteSocieteImmeubleContact)) {
            // set the owning side to null (unless already changed)
            if ($opportuniteSocieteImmeubleContact->getImmeuble() === $this) {
                $opportuniteSocieteImmeubleContact->setImmeuble(null);
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
            $immeubleContact->setImmeuble($this);
        }

        return $this;
    }

    public function removeImmeubleContact(ImmeubleContact $immeubleContact): self
    {
        if ($this->immeubleContacts->removeElement($immeubleContact)) {
            // set the owning side to null (unless already changed)
            if ($immeubleContact->getImmeuble() === $this) {
                $immeubleContact->setImmeuble(null);
            }
        }

        return $this;
    }

    public function getRecherche(): ?Recherche
    {
        return $this->recherche;
    }

    public function setRecherche(?Recherche $recherche): self
    {
        $this->recherche = $recherche;

        return $this;
    }
}
