<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230904124748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE qualite ADD idqualite INT AUTO_INCREMENT NOT NULL, DROP id, ADD PRIMARY KEY (idqualite)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE qualite MODIFY idqualite INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON qualite');
        $this->addSql('ALTER TABLE qualite ADD id INT NOT NULL, DROP idqualite');
    }
}
