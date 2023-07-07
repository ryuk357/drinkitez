<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230707094622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drink ADD party_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE drink ADD CONSTRAINT FK_DBE40D1213C1059 FOREIGN KEY (party_id) REFERENCES party (id)');
        $this->addSql('CREATE INDEX IDX_DBE40D1213C1059 ON drink (party_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drink DROP FOREIGN KEY FK_DBE40D1213C1059');
        $this->addSql('DROP INDEX IDX_DBE40D1213C1059 ON drink');
        $this->addSql('ALTER TABLE drink DROP party_id');
    }
}
