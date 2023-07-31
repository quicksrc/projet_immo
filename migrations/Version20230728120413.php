<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230728120413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_contact ADD num_voie_adresse VARCHAR(10) DEFAULT NULL, ADD type_voie_adresse VARCHAR(20) DEFAULT NULL, ADD adresse_adresse VARCHAR(255) DEFAULT NULL, ADD cp_adresse VARCHAR(20) DEFAULT NULL, ADD ville_adresse VARCHAR(100) DEFAULT NULL, ADD adresse_principale_adresse SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_contact DROP num_voie_adresse, DROP type_voie_adresse, DROP adresse_adresse, DROP cp_adresse, DROP ville_adresse, DROP adresse_principale_adresse');
    }
}
