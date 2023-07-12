<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711074257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE societe_contact (idsociete_contact INT AUTO_INCREMENT NOT NULL, qualite INT DEFAULT NULL, qualite_proprietaire VARCHAR(100) DEFAULT NULL, genre VARCHAR(100) DEFAULT NULL, principal SMALLINT DEFAULT NULL, PRIMARY KEY(idsociete_contact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suivi_par (idsuivi_par INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idsuivi_par)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE theme (idtheme INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idtheme)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_voie (idtype_voie INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(100) DEFAULT NULL, PRIMARY KEY(idtype_voie)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vue (idvue INT AUTO_INCREMENT NOT NULL, nom_table VARCHAR(100) DEFAULT NULL, intitule VARCHAR(100) DEFAULT NULL, nom_connexion VARCHAR(50) DEFAULT NULL, champ_tri VARCHAR(100) DEFAULT NULL, ordre_tri VARCHAR(4) DEFAULT NULL, passage_mode_fiche INT DEFAULT NULL, par_defaut INT DEFAULT NULL, PRIMARY KEY(idvue)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD idaction INT AUTO_INCREMENT NOT NULL, DROP id_action, ADD PRIMARY KEY (idaction)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE societe_contact');
        $this->addSql('DROP TABLE suivi_par');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE type_voie');
        $this->addSql('DROP TABLE vue');
        $this->addSql('ALTER TABLE action MODIFY idaction INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON action');
        $this->addSql('ALTER TABLE action ADD id_action INT NOT NULL, DROP idaction');
    }
}
