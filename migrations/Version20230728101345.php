<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230728101345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_contact ADD ref_proprio_immeuble INT DEFAULT NULL, ADD origine_contact_immeuble VARCHAR(255) DEFAULT NULL, ADD ncpcf_immeuble SMALLINT DEFAULT NULL, ADD visite_immeuble SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_contact DROP ref_proprio_immeuble, DROP origine_contact_immeuble, DROP ncpcf_immeuble, DROP visite_immeuble');
    }
}
