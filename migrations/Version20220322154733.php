<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220322154733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE degree (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(120) NOT NULL, rncplevel INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, training_program_id INT DEFAULT NULL, training_center_id INT DEFAULT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, INDEX IDX_D5128A8F8406BD6C (training_program_id), INDEX IDX_D5128A8F37BE9083 (training_center_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_center (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, address VARCHAR(80) NOT NULL, zip_code VARCHAR(5) NOT NULL, city VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_program (id INT AUTO_INCREMENT NOT NULL, degree_id INT DEFAULT NULL, label VARCHAR(150) NOT NULL, duration INT NOT NULL, INDEX IDX_4FD3E78AB35C5756 (degree_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F8406BD6C FOREIGN KEY (training_program_id) REFERENCES training_program (id)');
        $this->addSql('ALTER TABLE training ADD CONSTRAINT FK_D5128A8F37BE9083 FOREIGN KEY (training_center_id) REFERENCES training_center (id)');
        $this->addSql('ALTER TABLE training_program ADD CONSTRAINT FK_4FD3E78AB35C5756 FOREIGN KEY (degree_id) REFERENCES degree (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE training_program DROP FOREIGN KEY FK_4FD3E78AB35C5756');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F37BE9083');
        $this->addSql('ALTER TABLE training DROP FOREIGN KEY FK_D5128A8F8406BD6C');
        $this->addSql('DROP TABLE degree');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE training_center');
        $this->addSql('DROP TABLE training_program');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(80) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
