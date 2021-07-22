<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722120844 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, pattern_id INT NOT NULL, fabric_id INT NOT NULL, measurements_id INT NOT NULL, status_id INT DEFAULT NULL, shipping_address VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_F5299398F734A20F (pattern_id), INDEX IDX_F5299398AB43EC50 (fabric_id), UNIQUE INDEX UNIQ_F5299398C6570731 (measurements_id), INDEX IDX_F52993986BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398F734A20F FOREIGN KEY (pattern_id) REFERENCES pattern (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398AB43EC50 FOREIGN KEY (fabric_id) REFERENCES fabric (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398C6570731 FOREIGN KEY (measurements_id) REFERENCES measurement (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993986BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993986BF700BD');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE status');
    }
}
