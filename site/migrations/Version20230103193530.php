<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103193530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE point (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_locator (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trip (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', pickup_point_id INT DEFAULT NULL, destination_point_id INT DEFAULT NULL, type_vehicle VARCHAR(100) NOT NULL, serviceLocator INT DEFAULT NULL, INDEX IDX_7656F53B682033F1 (pickup_point_id), INDEX IDX_7656F53B9E980E93 (destination_point_id), INDEX IDX_7656F53B720FA546 (serviceLocator), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trip ADD CONSTRAINT FK_7656F53B682033F1 FOREIGN KEY (pickup_point_id) REFERENCES point (id)');
        $this->addSql('ALTER TABLE trip ADD CONSTRAINT FK_7656F53B9E980E93 FOREIGN KEY (destination_point_id) REFERENCES point (id)');
        $this->addSql('ALTER TABLE trip ADD CONSTRAINT FK_7656F53B720FA546 FOREIGN KEY (serviceLocator) REFERENCES service_locator (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trip DROP FOREIGN KEY FK_7656F53B682033F1');
        $this->addSql('ALTER TABLE trip DROP FOREIGN KEY FK_7656F53B9E980E93');
        $this->addSql('ALTER TABLE trip DROP FOREIGN KEY FK_7656F53B720FA546');
        $this->addSql('DROP TABLE point');
        $this->addSql('DROP TABLE service_locator');
        $this->addSql('DROP TABLE trip');
        $this->addSql('DROP TABLE user');
    }
}
