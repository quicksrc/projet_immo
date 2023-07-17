<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717085813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opportunite DROP INDEX UNIQ_97889F98D872F8D1, ADD INDEX IDX_97889F98D872F8D1 (IDImmeuble)');
        $this->addSql('ALTER TABLE opportunite DROP INDEX UNIQ_97889F98725BB6BA, ADD INDEX IDX_97889F98725BB6BA (IDSociete)');
        $this->addSql('ALTER TABLE opportunite DROP INDEX UNIQ_97889F98275C6D3F, ADD INDEX IDX_97889F98275C6D3F (IDContact)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE opportunite DROP INDEX IDX_97889F98D872F8D1, ADD UNIQUE INDEX UNIQ_97889F98D872F8D1 (IDImmeuble)');
        $this->addSql('ALTER TABLE opportunite DROP INDEX IDX_97889F98725BB6BA, ADD UNIQUE INDEX UNIQ_97889F98725BB6BA (IDSociete)');
        $this->addSql('ALTER TABLE opportunite DROP INDEX IDX_97889F98275C6D3F, ADD UNIQUE INDEX UNIQ_97889F98275C6D3F (IDContact)');
    }
}
