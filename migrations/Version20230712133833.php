<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230712133833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (idaction INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idaction)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite (idactivite INT AUTO_INCREMENT NOT NULL, date_activite DATETIME DEFAULT NULL, theme VARCHAR(100) DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, action VARCHAR(100) DEFAULT NULL, nom_fichier VARCHAR(255) DEFAULT NULL, icone VARCHAR(255) DEFAULT NULL, IDImmeuble INT DEFAULT NULL, IDContact INT DEFAULT NULL, IDSociete INT DEFAULT NULL, INDEX IDX_B8755515D872F8D1 (IDImmeuble), INDEX IDX_B8755515275C6D3F (IDContact), INDEX IDX_B8755515725BB6BA (IDSociete), PRIMARY KEY(idactivite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_societe (idactivite_societe INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idactivite_societe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (idadresse INT AUTO_INCREMENT NOT NULL, num_principal VARCHAR(10) DEFAULT NULL, num_secondaire VARCHAR(10) DEFAULT NULL, type_voie VARCHAR(20) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, cp VARCHAR(20) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, adresse_principale SMALLINT DEFAULT NULL, IDImmeuble INT DEFAULT NULL, INDEX IDX_C35F0816D872F8D1 (IDImmeuble), PRIMARY KEY(idadresse)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse_ip (idadresse_ip INT AUTO_INCREMENT NOT NULL, groupe SMALLINT DEFAULT NULL, adresse_depart VARCHAR(50) DEFAULT NULL, adresse_fin VARCHAR(50) DEFAULT NULL, nom_plage VARCHAR(255) DEFAULT NULL, PRIMARY KEY(idadresse_ip)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE civilite (idcivilite INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idcivilite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connexion (idconnexion INT AUTO_INCREMENT NOT NULL, adresse_ip VARCHAR(50) DEFAULT NULL, date_debut DATETIME DEFAULT NULL, heure_debut VARCHAR(10) DEFAULT NULL, date_fin DATETIME DEFAULT NULL, heure_fin VARCHAR(10) DEFAULT NULL, nom_connexion VARCHAR(50) DEFAULT NULL, PRIMARY KEY(idconnexion)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (idcontact INT AUTO_INCREMENT NOT NULL, date_modification DATETIME DEFAULT NULL, civilite VARCHAR(100) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, societe VARCHAR(255) DEFAULT NULL, correspondant VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, cp VARCHAR(20) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, pays VARCHAR(100) DEFAULT NULL, telephone VARCHAR(20) DEFAULT NULL, fax VARCHAR(20) DEFAULT NULL, telephone_portable VARCHAR(20) DEFAULT NULL, telephone_domicile VARCHAR(20) DEFAULT NULL, liste_rouge SMALLINT DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, date_naissance DATETIME DEFAULT NULL, activite VARCHAR(100) DEFAULT NULL, rcs VARCHAR(50) DEFAULT NULL, anti_mailing SMALLINT DEFAULT NULL, npai SMALLINT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, dcd SMALLINT DEFAULT NULL, PRIMARY KEY(idcontact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE description (iddescription INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(iddescription)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enquete (idenquete INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idenquete)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entite_societe (identite_societe INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(identite_societe)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonction (idfonction INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idfonction)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gen_etat_champ (idgen_etat_champ INT AUTO_INCREMENT NOT NULL, champ_sql VARCHAR(100) DEFAULT NULL, table_sql VARCHAR(100) DEFAULT NULL, tri VARCHAR(50) DEFAULT NULL, afficher VARCHAR(3) DEFAULT NULL, critere1 VARCHAR(255) DEFAULT NULL, critere2 VARCHAR(255) DEFAULT NULL, critere3 VARCHAR(255) DEFAULT NULL, critere4 VARCHAR(255) DEFAULT NULL, taille_colonne INT DEFAULT NULL, ordre INT DEFAULT NULL, PRIMARY KEY(idgen_etat_champ)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble (idimmeuble INT AUTO_INCREMENT NOT NULL, date_enquete DATETIME DEFAULT NULL, reference_proprio INT DEFAULT NULL, num_planche_cadastrale VARCHAR(10) DEFAULT NULL, sms SMALLINT DEFAULT NULL, etat_dossier VARCHAR(100) DEFAULT NULL, enquete VARCHAR(100) DEFAULT NULL, nom_gardien VARCHAR(150) DEFAULT NULL, description VARCHAR(100) DEFAULT NULL, suivi_par VARCHAR(100) DEFAULT NULL, vendu SMALLINT DEFAULT NULL, date_vente DATETIME DEFAULT NULL, origine_contact VARCHAR(255) DEFAULT NULL, intermediaire VARCHAR(255) DEFAULT NULL, ncpcf SMALLINT DEFAULT NULL, visite SMALLINT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, num_principal INT DEFAULT NULL, num_secondaire VARCHAR(10) DEFAULT NULL, type_voie VARCHAR(20) DEFAULT NULL, nom_rue VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, cp VARCHAR(255) DEFAULT NULL, ville VARCHAR(255) DEFAULT NULL, contact_principal VARCHAR(100) DEFAULT NULL, photo1 VARCHAR(255) DEFAULT NULL, photo2 VARCHAR(255) DEFAULT NULL, date_visite DATETIME DEFAULT NULL, regroupement_act VARCHAR(50) DEFAULT NULL, PRIMARY KEY(idimmeuble)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble_contact (idimmeuble_contact INT AUTO_INCREMENT NOT NULL, qualite VARCHAR(100) DEFAULT NULL, qualite_proprietaire VARCHAR(100) DEFAULT NULL, genre VARCHAR(100) DEFAULT NULL, principal SMALLINT DEFAULT NULL, ne_vend_pas SMALLINT DEFAULT NULL, date_nvp DATETIME DEFAULT NULL, PRIMARY KEY(idimmeuble_contact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble_contact_immeuble (IDImmeubleContact INT NOT NULL, IDImmeuble INT NOT NULL, INDEX IDX_68AF53ED17586EF8 (IDImmeubleContact), INDEX IDX_68AF53EDD872F8D1 (IDImmeuble), PRIMARY KEY(IDImmeubleContact, IDImmeuble)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble_contact_contact (IDImmeubleContact INT NOT NULL, IDContact INT NOT NULL, INDEX IDX_2A6F734517586EF8 (IDImmeubleContact), INDEX IDX_2A6F7345275C6D3F (IDContact), PRIMARY KEY(IDImmeubleContact, IDContact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opportunite (idopportunite INT AUTO_INCREMENT NOT NULL, date DATETIME DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, societe_concernee VARCHAR(100) DEFAULT NULL, gerance SMALLINT DEFAULT NULL, PRIMARY KEY(idopportunite)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origine_contact (idorigine_contact INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idorigine_contact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE origine_contact_immeuble (idorigine_contact_immeuble INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) DEFAULT NULL, PRIMARY KEY(idorigine_contact_immeuble)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (idsociete INT AUTO_INCREMENT NOT NULL, date_creation DATETIME DEFAULT NULL, date_modification DATETIME DEFAULT NULL, origine_contact VARCHAR(100) DEFAULT NULL, date_edition_journal DATETIME DEFAULT NULL, num_jal INT DEFAULT NULL, responsable VARCHAR(100) DEFAULT NULL, vendeur_raison_social VARCHAR(255) DEFAULT NULL, vendeur_adresse VARCHAR(255) DEFAULT NULL, vendeur_cp VARCHAR(20) DEFAULT NULL, vendeur_ville VARCHAR(100) DEFAULT NULL, vendeur_pays VARCHAR(100) DEFAULT NULL, vendeur_telephone_societe VARCHAR(20) DEFAULT NULL, vendeur_fax_societe VARCHAR(20) DEFAULT NULL, vendeur_rcs VARCHAR(50) DEFAULT NULL, vendeur_capital DOUBLE PRECISION DEFAULT NULL, vendeur_nom_dirigeant VARCHAR(100) DEFAULT NULL, vendeur_tel_portable VARCHAR(20) DEFAULT NULL, vendeur_tel_perso VARCHAR(20) DEFAULT NULL, vendeur_email VARCHAR(255) DEFAULT NULL, vendeur_date_naissance DATETIME DEFAULT NULL, vendeur_adresse_fonds_vendu VARCHAR(255) DEFAULT NULL, activite_fds_commerce VARCHAR(100) DEFAULT NULL, date_act_cession DATETIME DEFAULT NULL, prix_vente DOUBLE PRECISION DEFAULT NULL, tresorerie DOUBLE PRECISION DEFAULT NULL, report_deficitaire DOUBLE PRECISION DEFAULT NULL, immobilier LONGTEXT DEFAULT NULL, acheteur_raison_sociale VARCHAR(255) DEFAULT NULL, acheteur_adresse VARCHAR(255) DEFAULT NULL, acheteur_cp VARCHAR(20) DEFAULT NULL, acheteur_ville VARCHAR(100) DEFAULT NULL, acheteur_pays VARCHAR(100) DEFAULT NULL, acheteur_telephone VARCHAR(20) DEFAULT NULL, acheteur_fax VARCHAR(20) DEFAULT NULL, acheteur_rcs VARCHAR(50) DEFAULT NULL, acheteur_capital DOUBLE PRECISION DEFAULT NULL, acheteur_nom_dirigeant VARCHAR(100) DEFAULT NULL, acheteur_tel_portable VARCHAR(20) DEFAULT NULL, acheteur_date_naissance DATETIME DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(idsociete)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe_contact (idsociete_contact INT AUTO_INCREMENT NOT NULL, qualite INT DEFAULT NULL, qualite_proprietaire VARCHAR(100) DEFAULT NULL, genre VARCHAR(100) DEFAULT NULL, principal SMALLINT DEFAULT NULL, PRIMARY KEY(idsociete_contact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi_par (idsuivi_par INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idsuivi_par)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (idtheme INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idtheme)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_voie (idtype_voie INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idtype_voie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vue (idvue INT AUTO_INCREMENT NOT NULL, nom_table VARCHAR(100) DEFAULT NULL, intitule VARCHAR(100) DEFAULT NULL, nom_connexion VARCHAR(50) DEFAULT NULL, champ_tri VARCHAR(100) DEFAULT NULL, ordre_tri VARCHAR(4) DEFAULT NULL, passage_mode_fiche INT DEFAULT NULL, par_defaut INT DEFAULT NULL, PRIMARY KEY(idvue)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515D872F8D1 FOREIGN KEY (IDImmeuble) REFERENCES immeuble (idimmeuble)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515275C6D3F FOREIGN KEY (IDContact) REFERENCES contact (idcontact)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515725BB6BA FOREIGN KEY (IDSociete) REFERENCES societe (idsociete)');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816D872F8D1 FOREIGN KEY (IDImmeuble) REFERENCES immeuble (idimmeuble)');
        $this->addSql('ALTER TABLE immeuble_contact_immeuble ADD CONSTRAINT FK_68AF53ED17586EF8 FOREIGN KEY (IDImmeubleContact) REFERENCES immeuble_contact (idimmeuble_contact)');
        $this->addSql('ALTER TABLE immeuble_contact_immeuble ADD CONSTRAINT FK_68AF53EDD872F8D1 FOREIGN KEY (IDImmeuble) REFERENCES immeuble (idimmeuble)');
        $this->addSql('ALTER TABLE immeuble_contact_contact ADD CONSTRAINT FK_2A6F734517586EF8 FOREIGN KEY (IDImmeubleContact) REFERENCES immeuble_contact (idimmeuble_contact)');
        $this->addSql('ALTER TABLE immeuble_contact_contact ADD CONSTRAINT FK_2A6F7345275C6D3F FOREIGN KEY (IDContact) REFERENCES contact (idcontact)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515D872F8D1');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515275C6D3F');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515725BB6BA');
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816D872F8D1');
        $this->addSql('ALTER TABLE immeuble_contact_immeuble DROP FOREIGN KEY FK_68AF53ED17586EF8');
        $this->addSql('ALTER TABLE immeuble_contact_immeuble DROP FOREIGN KEY FK_68AF53EDD872F8D1');
        $this->addSql('ALTER TABLE immeuble_contact_contact DROP FOREIGN KEY FK_2A6F734517586EF8');
        $this->addSql('ALTER TABLE immeuble_contact_contact DROP FOREIGN KEY FK_2A6F7345275C6D3F');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_societe');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE adresse_ip');
        $this->addSql('DROP TABLE civilite');
        $this->addSql('DROP TABLE connexion');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE enquete');
        $this->addSql('DROP TABLE entite_societe');
        $this->addSql('DROP TABLE fonction');
        $this->addSql('DROP TABLE gen_etat_champ');
        $this->addSql('DROP TABLE immeuble');
        $this->addSql('DROP TABLE immeuble_contact');
        $this->addSql('DROP TABLE immeuble_contact_immeuble');
        $this->addSql('DROP TABLE immeuble_contact_contact');
        $this->addSql('DROP TABLE opportunite');
        $this->addSql('DROP TABLE origine_contact');
        $this->addSql('DROP TABLE origine_contact_immeuble');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE societe_contact');
        $this->addSql('DROP TABLE suivi_par');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE type_voie');
        $this->addSql('DROP TABLE vue');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
