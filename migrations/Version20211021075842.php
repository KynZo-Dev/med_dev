<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211021075842 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE livres (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, auteur VARCHAR(255) NOT NULL, genre VARCHAR(255) NOT NULL, parution DATE NOT NULL, img_couverture VARCHAR(255) NOT NULL, disponible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resa (id INT AUTO_INCREMENT NOT NULL, users_id INT NOT NULL, resa_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', resa_max_at DATETIME DEFAULT NULL, resa_long_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', resa_long_max_at DATETIME DEFAULT NULL, INDEX IDX_90C9C53B67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, anniversaire DATE NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE resa ADD CONSTRAINT FK_90C9C53B67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resa DROP FOREIGN KEY FK_90C9C53B67B3B43D');
        $this->addSql('DROP TABLE livres');
        $this->addSql('DROP TABLE resa');
        $this->addSql('DROP TABLE users');
    }
}
