<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711142801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble_contact_immeuble ADD CONSTRAINT FK_68AF53ED17586EF8 FOREIGN KEY (IDImmeubleContact) REFERENCES immeuble_contact (IDImmeubleContact)');
        $this->addSql('ALTER TABLE immeuble_contact_immeuble ADD CONSTRAINT FK_68AF53EDD872F8D1 FOREIGN KEY (IDImmeuble) REFERENCES immeuble (IDImmeuble)');
        $this->addSql('ALTER TABLE immeuble_contact_contact ADD CONSTRAINT FK_2A6F734517586EF8 FOREIGN KEY (IDImmeubleContact) REFERENCES immeuble_contact (IDImmeubleContact)');
        $this->addSql('ALTER TABLE immeuble_contact_contact ADD CONSTRAINT FK_2A6F7345275C6D3F FOREIGN KEY (IDContact) REFERENCES contact (IDContact)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble_contact_contact DROP FOREIGN KEY FK_2A6F734517586EF8');
        $this->addSql('ALTER TABLE immeuble_contact_contact DROP FOREIGN KEY FK_2A6F7345275C6D3F');
        $this->addSql('ALTER TABLE immeuble_contact_immeuble DROP FOREIGN KEY FK_68AF53ED17586EF8');
        $this->addSql('ALTER TABLE immeuble_contact_immeuble DROP FOREIGN KEY FK_68AF53EDD872F8D1');
    }
}
