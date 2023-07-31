<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230731102847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_societe ADD civilite_contact VARCHAR(100) DEFAULT NULL, ADD nom_contact VARCHAR(255) DEFAULT NULL, ADD prenom_contact VARCHAR(255) DEFAULT NULL, ADD adresse_contact VARCHAR(255) DEFAULT NULL, ADD cp_contact VARCHAR(20) DEFAULT NULL, ADD ville_contact VARCHAR(100) DEFAULT NULL, ADD fonction_contact VARCHAR(255) DEFAULT NULL, ADD correspondant_contact VARCHAR(255) DEFAULT NULL, ADD anti_mailing_contact SMALLINT DEFAULT NULL, ADD societe_contact VARCHAR(255) DEFAULT NULL, ADD npai_contact SMALLINT DEFAULT NULL, ADD activite_contact VARCHAR(100) DEFAULT NULL, ADD rcs_contact VARCHAR(50) DEFAULT NULL, ADD principal_contact SMALLINT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_societe DROP civilite_contact, DROP nom_contact, DROP prenom_contact, DROP adresse_contact, DROP cp_contact, DROP ville_contact, DROP fonction_contact, DROP correspondant_contact, DROP anti_mailing_contact, DROP societe_contact, DROP npai_contact, DROP activite_contact, DROP rcs_contact, DROP principal_contact');
    }
}
