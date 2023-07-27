<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230726142021 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE immeuble_contact_contact');
        $this->addSql('DROP TABLE immeuble_contact_immeuble');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE immeuble_contact_contact (IDImmeubleContact INT NOT NULL, IDContact INT NOT NULL, INDEX IDX_2A6F734517586EF8 (IDImmeubleContact), INDEX IDX_2A6F7345275C6D3F (IDContact), PRIMARY KEY(IDImmeubleContact, IDContact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE immeuble_contact_immeuble (IDImmeubleContact INT NOT NULL, IDImmeuble INT NOT NULL, INDEX IDX_68AF53ED17586EF8 (IDImmeubleContact), INDEX IDX_68AF53EDD872F8D1 (IDImmeuble), PRIMARY KEY(IDImmeubleContact, IDImmeuble)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
    }
}
