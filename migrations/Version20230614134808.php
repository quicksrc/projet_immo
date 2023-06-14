<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230614134808 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_immeuble_contact_societe (id INT AUTO_INCREMENT NOT NULL, immeuble_id INT DEFAULT NULL, contact_id INT DEFAULT NULL, activite_id INT DEFAULT NULL, date_activite DATETIME NOT NULL, commentaire LONGTEXT DEFAULT NULL, action VARCHAR(200) NOT NULL, nom_fichier VARCHAR(510) DEFAULT NULL, icone LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_C9065B6263768E3F (immeuble_id), INDEX IDX_C9065B62E7A1254A (contact_id), INDEX IDX_C9065B629B0F88B1 (activite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activite_immeuble_contact_societe_societe (activite_immeuble_contact_societe_id INT NOT NULL, societe_id INT NOT NULL, INDEX IDX_EC6DAFFC9D3EFB1D (activite_immeuble_contact_societe_id), INDEX IDX_EC6DAFFCFCF77503 (societe_id), PRIMARY KEY(activite_immeuble_contact_societe_id, societe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, num_principal VARCHAR(20) NOT NULL, num_secondaire VARCHAR(20) NOT NULL, type_voie VARCHAR(40) NOT NULL, adresse VARCHAR(510) NOT NULL, cp VARCHAR(40) NOT NULL, ville VARCHAR(200) NOT NULL, pays VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse_immeuble (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, adresse_principale SMALLINT NOT NULL, INDEX IDX_2663C3934DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, typecontact_id INT DEFAULT NULL, date_modification DATETIME NOT NULL, civilite VARCHAR(200) NOT NULL, nom VARCHAR(510) NOT NULL, prenom VARCHAR(510) NOT NULL, societe VARCHAR(510) NOT NULL, correspondant VARCHAR(510) NOT NULL, telephone VARCHAR(40) NOT NULL, fax VARCHAR(40) DEFAULT NULL, telephone_portable VARCHAR(40) DEFAULT NULL, telephone_domicile VARCHAR(40) DEFAULT NULL, liste_rouge SMALLINT NOT NULL, email VARCHAR(510) NOT NULL, date_naissance DATETIME NOT NULL, activite VARCHAR(200) NOT NULL, rcs VARCHAR(100) DEFAULT NULL, anti_mailing SMALLINT NOT NULL, npai SMALLINT NOT NULL, commentaire LONGTEXT DEFAULT NULL, fonction VARCHAR(510) NOT NULL, dcd SMALLINT NOT NULL, INDEX IDX_4C62E6384DE7DC5C (adresse_id), INDEX IDX_4C62E6381EFBC547 (typecontact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble (id INT AUTO_INCREMENT NOT NULL, adresse_immeuble_id INT DEFAULT NULL, recherche_id INT DEFAULT NULL, date_enquete DATETIME DEFAULT NULL, reference_proprio INT NOT NULL, num_planche_cadast VARCHAR(20) DEFAULT NULL, sms SMALLINT DEFAULT NULL, etat_dossier VARCHAR(200) DEFAULT NULL, enquete VARCHAR(200) DEFAULT NULL, nom_gardien VARCHAR(300) DEFAULT NULL, description VARCHAR(200) DEFAULT NULL, suivi_par VARCHAR(200) DEFAULT NULL, vendu SMALLINT DEFAULT NULL, date_vente DATETIME DEFAULT NULL, origine_contact VARCHAR(510) DEFAULT NULL, intermediaire VARCHAR(510) DEFAULT NULL, ncpcf SMALLINT DEFAULT NULL, visite SMALLINT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, contact_principal VARCHAR(200) DEFAULT NULL, date_visite DATETIME DEFAULT NULL, regroupement_act VARCHAR(100) DEFAULT NULL, INDEX IDX_467D53F9AD7877D0 (adresse_immeuble_id), INDEX IDX_467D53F91E6A4A07 (recherche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE immeuble_contact (id INT AUTO_INCREMENT NOT NULL, immeuble_id INT DEFAULT NULL, contact_id INT DEFAULT NULL, qualite VARCHAR(200) NOT NULL, qualite_proprietaire VARCHAR(200) NOT NULL, genre VARCHAR(200) NOT NULL, principal SMALLINT NOT NULL, ne_vend_pas SMALLINT NOT NULL, date_nvp DATETIME NOT NULL, INDEX IDX_AA3C48F863768E3F (immeuble_id), INDEX IDX_AA3C48F8E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opportunite (id INT AUTO_INCREMENT NOT NULL, date DATETIME NOT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opportunite_societe_immeuble_contact (id INT AUTO_INCREMENT NOT NULL, immeuble_id INT DEFAULT NULL, contact_id INT DEFAULT NULL, societe_id INT DEFAULT NULL, opportunite_id INT DEFAULT NULL, date_opportunite DATETIME DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, societe_concernee VARCHAR(200) NOT NULL, gerance SMALLINT NOT NULL, INDEX IDX_1842969463768E3F (immeuble_id), INDEX IDX_18429694E7A1254A (contact_id), INDEX IDX_18429694FCF77503 (societe_id), INDEX IDX_1842969480FBB128 (opportunite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pj (id INT AUTO_INCREMENT NOT NULL, societe_id INT DEFAULT NULL, immeuble_id INT DEFAULT NULL, contact_id INT DEFAULT NULL, lien LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_C381E34FFCF77503 (societe_id), INDEX IDX_C381E34F63768E3F (immeuble_id), UNIQUE INDEX UNIQ_C381E34FE7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_B4271B46A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_contact (recherche_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_4DEF9F411E6A4A07 (recherche_id), INDEX IDX_4DEF9F41E7A1254A (contact_id), PRIMARY KEY(recherche_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_societe (recherche_id INT NOT NULL, societe_id INT NOT NULL, INDEX IDX_18E844C41E6A4A07 (recherche_id), INDEX IDX_18E844C4FCF77503 (societe_id), PRIMARY KEY(recherche_id, societe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_activite (recherche_id INT NOT NULL, activite_id INT NOT NULL, INDEX IDX_91AD11F41E6A4A07 (recherche_id), INDEX IDX_91AD11F49B0F88B1 (activite_id), PRIMARY KEY(recherche_id, activite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recherche_opportunite (recherche_id INT NOT NULL, opportunite_id INT NOT NULL, INDEX IDX_23B5F5C11E6A4A07 (recherche_id), INDEX IDX_23B5F5C180FBB128 (opportunite_id), PRIMARY KEY(recherche_id, opportunite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, etat_dossier VARCHAR(200) NOT NULL, origine_contact VARCHAR(200) NOT NULL, date_edition_journal DATETIME NOT NULL, num_jal INT NOT NULL, responsable VARCHAR(200) NOT NULL, activite_fds_commerce VARCHAR(200) NOT NULL, date_act_cession DATETIME DEFAULT NULL, prix_vente DOUBLE PRECISION NOT NULL, tresorerie DOUBLE PRECISION NOT NULL, report_deficitaire DOUBLE PRECISION NOT NULL, immobilier LONGTEXT DEFAULT NULL, acheteur_raison_soc VARCHAR(510) NOT NULL, acheteur_adresse VARCHAR(510) NOT NULL, acheteur_cp VARCHAR(40) NOT NULL, acheteur_ville VARCHAR(200) NOT NULL, acheteur_pays VARCHAR(200) NOT NULL, acheteur_telephone VARCHAR(40) DEFAULT NULL, acheteur_fax VARCHAR(40) DEFAULT NULL, acheteur_rcs VARCHAR(100) DEFAULT NULL, acheteur_capital DOUBLE PRECISION NOT NULL, acheteur_nom_dirige VARCHAR(200) NOT NULL, acheteur_tel_portable VARCHAR(40) DEFAULT NULL, acheteur_date_naissance DATETIME NOT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_19653DBD4DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe_contact (id INT AUTO_INCREMENT NOT NULL, contact_id INT NOT NULL, societe_id INT NOT NULL, qualite VARCHAR(200) NOT NULL, qualite_proprietaire VARCHAR(200) NOT NULL, genre VARCHAR(200) NOT NULL, principal SMALLINT NOT NULL, INDEX IDX_89A46BBBE7A1254A (contact_id), INDEX IDX_89A46BBBFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_contact (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vendeur_societe (id INT AUTO_INCREMENT NOT NULL, adresse_id INT NOT NULL, raison_sociale VARCHAR(510) NOT NULL, telephone VARCHAR(40) NOT NULL, fax VARCHAR(40) DEFAULT NULL, rcs VARCHAR(100) DEFAULT NULL, capital DOUBLE PRECISION NOT NULL, nom_dirigeant VARCHAR(200) NOT NULL, tel_portable VARCHAR(40) DEFAULT NULL, tel_perso VARCHAR(40) DEFAULT NULL, email VARCHAR(510) NOT NULL, adresse_fo VARCHAR(510) NOT NULL, date_naissance DATETIME NOT NULL, INDEX IDX_C3F3F1384DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe ADD CONSTRAINT FK_C9065B6263768E3F FOREIGN KEY (immeuble_id) REFERENCES immeuble (id)');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe ADD CONSTRAINT FK_C9065B62E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe ADD CONSTRAINT FK_C9065B629B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id)');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe_societe ADD CONSTRAINT FK_EC6DAFFC9D3EFB1D FOREIGN KEY (activite_immeuble_contact_societe_id) REFERENCES activite_immeuble_contact_societe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe_societe ADD CONSTRAINT FK_EC6DAFFCFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adresse_immeuble ADD CONSTRAINT FK_2663C3934DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6384DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6381EFBC547 FOREIGN KEY (typecontact_id) REFERENCES type_contact (id)');
        $this->addSql('ALTER TABLE immeuble ADD CONSTRAINT FK_467D53F9AD7877D0 FOREIGN KEY (adresse_immeuble_id) REFERENCES adresse_immeuble (id)');
        $this->addSql('ALTER TABLE immeuble ADD CONSTRAINT FK_467D53F91E6A4A07 FOREIGN KEY (recherche_id) REFERENCES recherche (id)');
        $this->addSql('ALTER TABLE immeuble_contact ADD CONSTRAINT FK_AA3C48F863768E3F FOREIGN KEY (immeuble_id) REFERENCES immeuble (id)');
        $this->addSql('ALTER TABLE immeuble_contact ADD CONSTRAINT FK_AA3C48F8E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact ADD CONSTRAINT FK_1842969463768E3F FOREIGN KEY (immeuble_id) REFERENCES immeuble (id)');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact ADD CONSTRAINT FK_18429694E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact ADD CONSTRAINT FK_18429694FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact ADD CONSTRAINT FK_1842969480FBB128 FOREIGN KEY (opportunite_id) REFERENCES opportunite (id)');
        $this->addSql('ALTER TABLE pj ADD CONSTRAINT FK_C381E34FFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE pj ADD CONSTRAINT FK_C381E34F63768E3F FOREIGN KEY (immeuble_id) REFERENCES immeuble (id)');
        $this->addSql('ALTER TABLE pj ADD CONSTRAINT FK_C381E34FE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE recherche ADD CONSTRAINT FK_B4271B46A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE recherche_contact ADD CONSTRAINT FK_4DEF9F411E6A4A07 FOREIGN KEY (recherche_id) REFERENCES recherche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_contact ADD CONSTRAINT FK_4DEF9F41E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_societe ADD CONSTRAINT FK_18E844C41E6A4A07 FOREIGN KEY (recherche_id) REFERENCES recherche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_societe ADD CONSTRAINT FK_18E844C4FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_activite ADD CONSTRAINT FK_91AD11F41E6A4A07 FOREIGN KEY (recherche_id) REFERENCES recherche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_activite ADD CONSTRAINT FK_91AD11F49B0F88B1 FOREIGN KEY (activite_id) REFERENCES activite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_opportunite ADD CONSTRAINT FK_23B5F5C11E6A4A07 FOREIGN KEY (recherche_id) REFERENCES recherche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE recherche_opportunite ADD CONSTRAINT FK_23B5F5C180FBB128 FOREIGN KEY (opportunite_id) REFERENCES opportunite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBD4DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE societe_contact ADD CONSTRAINT FK_89A46BBBE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE societe_contact ADD CONSTRAINT FK_89A46BBBFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE vendeur_societe ADD CONSTRAINT FK_C3F3F1384DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe DROP FOREIGN KEY FK_C9065B6263768E3F');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe DROP FOREIGN KEY FK_C9065B62E7A1254A');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe DROP FOREIGN KEY FK_C9065B629B0F88B1');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe_societe DROP FOREIGN KEY FK_EC6DAFFC9D3EFB1D');
        $this->addSql('ALTER TABLE activite_immeuble_contact_societe_societe DROP FOREIGN KEY FK_EC6DAFFCFCF77503');
        $this->addSql('ALTER TABLE adresse_immeuble DROP FOREIGN KEY FK_2663C3934DE7DC5C');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6384DE7DC5C');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6381EFBC547');
        $this->addSql('ALTER TABLE immeuble DROP FOREIGN KEY FK_467D53F9AD7877D0');
        $this->addSql('ALTER TABLE immeuble DROP FOREIGN KEY FK_467D53F91E6A4A07');
        $this->addSql('ALTER TABLE immeuble_contact DROP FOREIGN KEY FK_AA3C48F863768E3F');
        $this->addSql('ALTER TABLE immeuble_contact DROP FOREIGN KEY FK_AA3C48F8E7A1254A');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact DROP FOREIGN KEY FK_1842969463768E3F');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact DROP FOREIGN KEY FK_18429694E7A1254A');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact DROP FOREIGN KEY FK_18429694FCF77503');
        $this->addSql('ALTER TABLE opportunite_societe_immeuble_contact DROP FOREIGN KEY FK_1842969480FBB128');
        $this->addSql('ALTER TABLE pj DROP FOREIGN KEY FK_C381E34FFCF77503');
        $this->addSql('ALTER TABLE pj DROP FOREIGN KEY FK_C381E34F63768E3F');
        $this->addSql('ALTER TABLE pj DROP FOREIGN KEY FK_C381E34FE7A1254A');
        $this->addSql('ALTER TABLE recherche DROP FOREIGN KEY FK_B4271B46A76ED395');
        $this->addSql('ALTER TABLE recherche_contact DROP FOREIGN KEY FK_4DEF9F411E6A4A07');
        $this->addSql('ALTER TABLE recherche_contact DROP FOREIGN KEY FK_4DEF9F41E7A1254A');
        $this->addSql('ALTER TABLE recherche_societe DROP FOREIGN KEY FK_18E844C41E6A4A07');
        $this->addSql('ALTER TABLE recherche_societe DROP FOREIGN KEY FK_18E844C4FCF77503');
        $this->addSql('ALTER TABLE recherche_activite DROP FOREIGN KEY FK_91AD11F41E6A4A07');
        $this->addSql('ALTER TABLE recherche_activite DROP FOREIGN KEY FK_91AD11F49B0F88B1');
        $this->addSql('ALTER TABLE recherche_opportunite DROP FOREIGN KEY FK_23B5F5C11E6A4A07');
        $this->addSql('ALTER TABLE recherche_opportunite DROP FOREIGN KEY FK_23B5F5C180FBB128');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBD4DE7DC5C');
        $this->addSql('ALTER TABLE societe_contact DROP FOREIGN KEY FK_89A46BBBE7A1254A');
        $this->addSql('ALTER TABLE societe_contact DROP FOREIGN KEY FK_89A46BBBFCF77503');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE vendeur_societe DROP FOREIGN KEY FK_C3F3F1384DE7DC5C');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE activite_immeuble_contact_societe');
        $this->addSql('DROP TABLE activite_immeuble_contact_societe_societe');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE adresse_immeuble');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE immeuble');
        $this->addSql('DROP TABLE immeuble_contact');
        $this->addSql('DROP TABLE opportunite');
        $this->addSql('DROP TABLE opportunite_societe_immeuble_contact');
        $this->addSql('DROP TABLE pj');
        $this->addSql('DROP TABLE recherche');
        $this->addSql('DROP TABLE recherche_contact');
        $this->addSql('DROP TABLE recherche_societe');
        $this->addSql('DROP TABLE recherche_activite');
        $this->addSql('DROP TABLE recherche_opportunite');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE societe_contact');
        $this->addSql('DROP TABLE type_contact');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vendeur_societe');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
