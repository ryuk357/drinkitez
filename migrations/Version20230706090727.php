<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230706090727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE drink (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, qty INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE guest (id INT AUTO_INCREMENT NOT NULL, drink_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_ACB79A3536AA4BB4 (drink_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, party_id INT DEFAULT NULL, INDEX IDX_F5299398213C1059 (party_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_guest (order_id INT NOT NULL, guest_id INT NOT NULL, INDEX IDX_2F29EEC88D9F6D38 (order_id), INDEX IDX_2F29EEC89A4AA658 (guest_id), PRIMARY KEY(order_id, guest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE party (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE guest ADD CONSTRAINT FK_ACB79A3536AA4BB4 FOREIGN KEY (drink_id) REFERENCES drink (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398213C1059 FOREIGN KEY (party_id) REFERENCES party (id)');
        $this->addSql('ALTER TABLE order_guest ADD CONSTRAINT FK_2F29EEC88D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_guest ADD CONSTRAINT FK_2F29EEC89A4AA658 FOREIGN KEY (guest_id) REFERENCES guest (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE guest DROP FOREIGN KEY FK_ACB79A3536AA4BB4');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398213C1059');
        $this->addSql('ALTER TABLE order_guest DROP FOREIGN KEY FK_2F29EEC88D9F6D38');
        $this->addSql('ALTER TABLE order_guest DROP FOREIGN KEY FK_2F29EEC89A4AA658');
        $this->addSql('DROP TABLE drink');
        $this->addSql('DROP TABLE guest');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_guest');
        $this->addSql('DROP TABLE party');
    }
}
