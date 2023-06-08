<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608090418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, num_principal VARCHAR(20) NOT NULL, num_secondaire VARCHAR(20) NOT NULL, type_voie VARCHAR(40) NOT NULL, adresse VARCHAR(510) NOT NULL, cp VARCHAR(40) NOT NULL, ville VARCHAR(200) NOT NULL, pays VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, date_modification DATETIME NOT NULL, civilite VARCHAR(200) NOT NULL, nom VARCHAR(510) NOT NULL, prenom VARCHAR(510) NOT NULL, societe VARCHAR(510) NOT NULL, correspondant VARCHAR(510) NOT NULL, adresse VARCHAR(510) NOT NULL, cp VARCHAR(40) NOT NULL, ville VARCHAR(200) NOT NULL, pays VARCHAR(200) NOT NULL, telephone VARCHAR(40) NOT NULL, fax VARCHAR(40) DEFAULT NULL, telephone_portable VARCHAR(40) DEFAULT NULL, telephone_domicile VARCHAR(40) DEFAULT NULL, liste_rouge SMALLINT NOT NULL, email VARCHAR(510) NOT NULL, date_naissance DATETIME NOT NULL, activite VARCHAR(200) NOT NULL, rcs VARCHAR(100) DEFAULT NULL, anti_mailing SMALLINT NOT NULL, npai SMALLINT NOT NULL, commentaire LONGTEXT DEFAULT NULL, fonction VARCHAR(510) NOT NULL, dcd SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble (id INT AUTO_INCREMENT NOT NULL, date_enquete DATETIME NOT NULL, reference_proprio INT NOT NULL, num_planche_cadast VARCHAR(20) NOT NULL, sms SMALLINT NOT NULL, etat_dossier VARCHAR(200) NOT NULL, enquete VARCHAR(200) NOT NULL, nom_gardien VARCHAR(300) NOT NULL, description VARCHAR(200) NOT NULL, suivi_par VARCHAR(200) NOT NULL, vendu SMALLINT NOT NULL, date_vente DATETIME NOT NULL, origine_contact VARCHAR(510) NOT NULL, intermediaire VARCHAR(510) NOT NULL, ncpcf SMALLINT NOT NULL, visite SMALLINT NOT NULL, commentaire LONGTEXT NOT NULL, num_principal INT NOT NULL, num_secondaire VARCHAR(20) NOT NULL, type_voie VARCHAR(40) NOT NULL, nom_rue VARCHAR(510) NOT NULL, adresse VARCHAR(510) NOT NULL, cp VARCHAR(510) NOT NULL, ville VARCHAR(510) NOT NULL, contact_principal VARCHAR(200) NOT NULL, photo1 VARCHAR(255) DEFAULT NULL, photo2 VARCHAR(255) DEFAULT NULL, date_visite DATETIME DEFAULT NULL, regroupement_act VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble_contact (id INT AUTO_INCREMENT NOT NULL, qualite VARCHAR(200) NOT NULL, qualite_proprietaire VARCHAR(200) NOT NULL, genre VARCHAR(200) NOT NULL, principal SMALLINT NOT NULL, ne_vend_pas SMALLINT NOT NULL, date_nvp DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opportunite (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, etat_dossier VARCHAR(200) NOT NULL, origine_contact VARCHAR(200) NOT NULL, date_edition_journal DATETIME NOT NULL, num_jal INT NOT NULL, responsable VARCHAR(200) NOT NULL, activite_fds_commerce VARCHAR(200) NOT NULL, date_act_cession DATETIME DEFAULT NULL, prix_vente DOUBLE PRECISION NOT NULL, tresorerie DOUBLE PRECISION NOT NULL, report_deficitaire DOUBLE PRECISION NOT NULL, immobilier LONGTEXT DEFAULT NULL, acheteur_raison_soc VARCHAR(510) NOT NULL, acheteur_adresse VARCHAR(510) NOT NULL, acheteur_cp VARCHAR(40) NOT NULL, acheteur_ville VARCHAR(200) NOT NULL, acheteur_pays VARCHAR(200) NOT NULL, acheteur_telephone VARCHAR(40) DEFAULT NULL, acheteur_fax VARCHAR(40) DEFAULT NULL, acheteur_rcs VARCHAR(100) DEFAULT NULL, acheteur_capital DOUBLE PRECISION NOT NULL, acheteur_nom_dirige VARCHAR(200) NOT NULL, acheteur_tel_portable VARCHAR(40) DEFAULT NULL, acheteur_date_naissance DATETIME NOT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe_contact (id INT AUTO_INCREMENT NOT NULL, qualite VARCHAR(200) NOT NULL, qualite_proprietaire VARCHAR(200) NOT NULL, genre VARCHAR(200) NOT NULL, principal SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_contact (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendeur_societe (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, raison_sociale VARCHAR(510) NOT NULL, telephone VARCHAR(40) NOT NULL, fax VARCHAR(40) DEFAULT NULL, rcs VARCHAR(100) DEFAULT NULL, capital DOUBLE PRECISION NOT NULL, nom_dirigeant VARCHAR(200) NOT NULL, tel_portable VARCHAR(40) DEFAULT NULL, tel_perso VARCHAR(40) DEFAULT NULL, email VARCHAR(510) NOT NULL, adresse_fo VARCHAR(510) NOT NULL, date_naissance DATETIME NOT NULL, INDEX IDX_C3F3F1384DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vendeur_societe ADD CONSTRAINT FK_C3F3F1384DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vendeur_societe DROP FOREIGN KEY FK_C3F3F1384DE7DC5C');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE immeuble');
        $this->addSql('DROP TABLE immeuble_contact');
        $this->addSql('DROP TABLE opportunite');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE societe_contact');
        $this->addSql('DROP TABLE type_contact');
        $this->addSql('DROP TABLE vendeur_societe');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
