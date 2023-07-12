<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711124619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite ADD IDImmeuble INT DEFAULT NULL, ADD IDContact INT DEFAULT NULL, ADD IDSociete INT DEFAULT NULL');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515D872F8D1 FOREIGN KEY (IDImmeuble) REFERENCES immeuble (IDImmeuble)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515275C6D3F FOREIGN KEY (IDContact) REFERENCES contact (IDContact)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515725BB6BA FOREIGN KEY (IDSociete) REFERENCES societe (IDSociete)');
        $this->addSql('CREATE INDEX IDX_B8755515D872F8D1 ON activite (IDImmeuble)');
        $this->addSql('CREATE INDEX IDX_B8755515275C6D3F ON activite (IDContact)');
        $this->addSql('CREATE INDEX IDX_B8755515725BB6BA ON activite (IDSociete)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515D872F8D1');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515275C6D3F');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515725BB6BA');
        $this->addSql('DROP INDEX IDX_B8755515D872F8D1 ON activite');
        $this->addSql('DROP INDEX IDX_B8755515275C6D3F ON activite');
        $this->addSql('DROP INDEX IDX_B8755515725BB6BA ON activite');
        $this->addSql('ALTER TABLE activite DROP IDImmeuble, DROP IDContact, DROP IDSociete');
    }
}
