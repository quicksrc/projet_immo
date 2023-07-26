<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230726090726 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble_contact DROP INDEX UNIQ_AA3C48F8275C6D3F, ADD INDEX IDX_AA3C48F8275C6D3F (IDContact)');
        $this->addSql('ALTER TABLE immeuble_contact DROP INDEX UNIQ_AA3C48F8D872F8D1, ADD INDEX IDX_AA3C48F8D872F8D1 (IDImmeuble)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble_contact DROP INDEX IDX_AA3C48F8D872F8D1, ADD UNIQUE INDEX UNIQ_AA3C48F8D872F8D1 (IDImmeuble)');
        $this->addSql('ALTER TABLE immeuble_contact DROP INDEX IDX_AA3C48F8275C6D3F, ADD UNIQUE INDEX UNIQ_AA3C48F8275C6D3F (IDContact)');
    }
}
