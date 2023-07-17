<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230713075839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opportunite ADD IDImmeuble INT DEFAULT NULL, ADD IDSociete INT DEFAULT NULL, ADD IDContact INT DEFAULT NULL');
        $this->addSql('ALTER TABLE opportunite ADD CONSTRAINT FK_97889F98D872F8D1 FOREIGN KEY (IDImmeuble) REFERENCES immeuble (idimmeuble)');
        $this->addSql('ALTER TABLE opportunite ADD CONSTRAINT FK_97889F98725BB6BA FOREIGN KEY (IDSociete) REFERENCES societe (idsociete)');
        $this->addSql('ALTER TABLE opportunite ADD CONSTRAINT FK_97889F98275C6D3F FOREIGN KEY (IDContact) REFERENCES contact (idcontact)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97889F98D872F8D1 ON opportunite (IDImmeuble)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97889F98725BB6BA ON opportunite (IDSociete)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_97889F98275C6D3F ON opportunite (IDContact)');
        $this->addSql('ALTER TABLE societe ADD etat_dossier VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opportunite DROP FOREIGN KEY FK_97889F98D872F8D1');
        $this->addSql('ALTER TABLE opportunite DROP FOREIGN KEY FK_97889F98725BB6BA');
        $this->addSql('ALTER TABLE opportunite DROP FOREIGN KEY FK_97889F98275C6D3F');
        $this->addSql('DROP INDEX UNIQ_97889F98D872F8D1 ON opportunite');
        $this->addSql('DROP INDEX UNIQ_97889F98725BB6BA ON opportunite');
        $this->addSql('DROP INDEX UNIQ_97889F98275C6D3F ON opportunite');
        $this->addSql('ALTER TABLE opportunite DROP IDImmeuble, DROP IDSociete, DROP IDContact');
        $this->addSql('ALTER TABLE societe DROP etat_dossier');
    }
}
