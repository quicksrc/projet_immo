<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607160209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opportunite MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON opportunite');
        $this->addSql('ALTER TABLE opportunite DROP id, CHANGE id_opportunite id_opportunite INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE opportunite ADD PRIMARY KEY (id_opportunite)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opportunite ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_opportunite id_opportunite INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
