<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230727153107 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recherche_contact (id INT AUTO_INCREMENT NOT NULL, civilite VARCHAR(100) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, adresse_contact VARCHAR(255) DEFAULT NULL, cp_contact VARCHAR(20) DEFAULT NULL, ville_contact VARCHAR(100) DEFAULT NULL, fonction VARCHAR(255) DEFAULT NULL, date_naissance DATETIME DEFAULT NULL, correspondant VARCHAR(255) DEFAULT NULL, anti_mailing SMALLINT DEFAULT NULL, societe_contact VARCHAR(255) DEFAULT NULL, npai SMALLINT DEFAULT NULL, activite_contact VARCHAR(100) DEFAULT NULL, rcs VARCHAR(50) DEFAULT NULL, qualite_contact VARCHAR(100) DEFAULT NULL, ne_vend_pas SMALLINT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recherche_contact');
    }
}
