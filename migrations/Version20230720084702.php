<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230720084702 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE recherche_immeuble (id INT AUTO_INCREMENT NOT NULL, ref_proprio_immeuble INT DEFAULT NULL, num_planch_cada VARCHAR(10) DEFAULT NULL, etat_dossier VARCHAR(100) DEFAULT NULL, enquete VARCHAR(100) DEFAULT NULL, date_enquete DATETIME DEFAULT NULL, description VARCHAR(100) DEFAULT NULL, suivi_par VARCHAR(100) DEFAULT NULL, vendu TINYINT(1) DEFAULT NULL, ncpcf TINYINT(1) DEFAULT NULL, origine_contact VARCHAR(255) DEFAULT NULL, visite TINYINT(1) DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE recherche_immeuble');
    }
}
