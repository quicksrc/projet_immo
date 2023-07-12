<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711134650 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD IDImmeuble INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816D872F8D1 FOREIGN KEY (IDImmeuble) REFERENCES immeuble (IDImmeuble)');
        $this->addSql('CREATE INDEX IDX_C35F0816D872F8D1 ON adresse (IDImmeuble)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816D872F8D1');
        $this->addSql('DROP INDEX IDX_C35F0816D872F8D1 ON adresse');
        $this->addSql('ALTER TABLE adresse DROP IDImmeuble');
    }
}
