<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722104029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE measurement (id INT AUTO_INCREMENT NOT NULL, neck DOUBLE PRECISION NOT NULL, shoulder_width DOUBLE PRECISION DEFAULT NULL, bust DOUBLE PRECISION DEFAULT NULL, waist DOUBLE PRECISION DEFAULT NULL, rise DOUBLE PRECISION DEFAULT NULL, hips DOUBLE PRECISION DEFAULT NULL, thigh DOUBLE PRECISION DEFAULT NULL, knee DOUBLE PRECISION DEFAULT NULL, calf DOUBLE PRECISION DEFAULT NULL, inseam DOUBLE PRECISION DEFAULT NULL, outseam DOUBLE PRECISION DEFAULT NULL, back_length DOUBLE PRECISION DEFAULT NULL, sleeve_length DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE measurement');
    }
}
