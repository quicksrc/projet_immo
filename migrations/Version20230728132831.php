<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230728132831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_contact ADD etat_dossier_societe VARCHAR(255) DEFAULT NULL, ADD responsable_societe VARCHAR(100) DEFAULT NULL, ADD origine_contact_societe VARCHAR(255) DEFAULT NULL, ADD raison_sociale_vendeur_societe VARCHAR(255) DEFAULT NULL, ADD cp_vendeur_societe VARCHAR(20) DEFAULT NULL, ADD raison_sociale_acheteur_societe VARCHAR(255) DEFAULT NULL, ADD cp_acheteur_societe VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE recherche_contact DROP etat_dossier_societe, DROP responsable_societe, DROP origine_contact_societe, DROP raison_sociale_vendeur_societe, DROP cp_vendeur_societe, DROP raison_sociale_acheteur_societe, DROP cp_acheteur_societe');
    }
}
