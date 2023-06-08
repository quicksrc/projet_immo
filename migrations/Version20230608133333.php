<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608133333 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble CHANGE num_planche_cadast num_planche_cadast VARCHAR(20) DEFAULT NULL, CHANGE sms sms SMALLINT DEFAULT NULL, CHANGE etat_dossier etat_dossier VARCHAR(200) DEFAULT NULL, CHANGE enquete enquete VARCHAR(200) DEFAULT NULL, CHANGE nom_gardien nom_gardien VARCHAR(300) DEFAULT NULL, CHANGE description description VARCHAR(200) DEFAULT NULL, CHANGE suivi_par suivi_par VARCHAR(200) DEFAULT NULL, CHANGE vendu vendu SMALLINT DEFAULT NULL, CHANGE date_vente date_vente DATETIME DEFAULT NULL, CHANGE origine_contact origine_contact VARCHAR(510) DEFAULT NULL, CHANGE intermediaire intermediaire VARCHAR(510) DEFAULT NULL, CHANGE ncpcf ncpcf SMALLINT DEFAULT NULL, CHANGE visite visite SMALLINT DEFAULT NULL, CHANGE commentaire commentaire LONGTEXT DEFAULT NULL, CHANGE contact_principal contact_principal VARCHAR(200) DEFAULT NULL, CHANGE regroupement_act regroupement_act VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE immeuble CHANGE num_planche_cadast num_planche_cadast VARCHAR(20) NOT NULL, CHANGE sms sms SMALLINT NOT NULL, CHANGE etat_dossier etat_dossier VARCHAR(200) NOT NULL, CHANGE enquete enquete VARCHAR(200) NOT NULL, CHANGE nom_gardien nom_gardien VARCHAR(300) NOT NULL, CHANGE description description VARCHAR(200) NOT NULL, CHANGE suivi_par suivi_par VARCHAR(200) NOT NULL, CHANGE vendu vendu SMALLINT NOT NULL, CHANGE date_vente date_vente DATETIME NOT NULL, CHANGE origine_contact origine_contact VARCHAR(510) NOT NULL, CHANGE intermediaire intermediaire VARCHAR(510) NOT NULL, CHANGE ncpcf ncpcf SMALLINT NOT NULL, CHANGE visite visite SMALLINT NOT NULL, CHANGE commentaire commentaire LONGTEXT NOT NULL, CHANGE contact_principal contact_principal VARCHAR(200) NOT NULL, CHANGE regroupement_act regroupement_act VARCHAR(100) NOT NULL');
    }
}
