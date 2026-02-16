<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260216150756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, supplier_id INT NOT NULL, INDEX IDX_1F1B251E2ADD6D8C (supplier_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('CREATE TABLE outfit (id INT AUTO_INCREMENT NOT NULL, people_id INT NOT NULL, pants_id INT NOT NULL, footwear_id INT NOT NULL, tshirt_id INT NOT NULL, INDEX IDX_320296013147C936 (people_id), INDEX IDX_320296013A9532DD (pants_id), INDEX IDX_32029601D55839F1 (footwear_id), INDEX IDX_3202960174D452 (tshirt_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('CREATE TABLE supplier (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, address VARCHAR(150) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E2ADD6D8C FOREIGN KEY (supplier_id) REFERENCES supplier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE outfit ADD CONSTRAINT FK_320296013147C936 FOREIGN KEY (people_id) REFERENCES people (id)');
        $this->addSql('ALTER TABLE outfit ADD CONSTRAINT FK_320296013A9532DD FOREIGN KEY (pants_id) REFERENCES pants (id)');
        $this->addSql('ALTER TABLE outfit ADD CONSTRAINT FK_32029601D55839F1 FOREIGN KEY (footwear_id) REFERENCES footwear (id)');
        $this->addSql('ALTER TABLE outfit ADD CONSTRAINT FK_3202960174D452 FOREIGN KEY (tshirt_id) REFERENCES tshirts (id)');
        $this->addSql('ALTER TABLE outfits DROP FOREIGN KEY `outfits_ibfk_1`');
        $this->addSql('ALTER TABLE outfits DROP FOREIGN KEY `outfits_ibfk_2`');
        $this->addSql('ALTER TABLE outfits DROP FOREIGN KEY `outfits_ibfk_3`');
        $this->addSql('ALTER TABLE outfits DROP FOREIGN KEY `outfits_ibfk_4`');
        $this->addSql('DROP TABLE outfits');
        $this->addSql('ALTER TABLE footwear CHANGE brand brand VARCHAR(25) NOT NULL, CHANGE size size INT NOT NULL, CHANGE color color VARCHAR(25) NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE pants CHANGE size size INT NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE brand brand VARCHAR(25) NOT NULL, CHANGE color color VARCHAR(25) NOT NULL');
        $this->addSql('ALTER TABLE people CHANGE name name VARCHAR(25) NOT NULL');
        $this->addSql('ALTER TABLE tshirts CHANGE size size INT NOT NULL, CHANGE color color VARCHAR(25) NOT NULL, CHANGE brand brand VARCHAR(25) NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE outfits (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, pants_id INT DEFAULT NULL, tshirt_id INT DEFAULT NULL, footwear_id INT DEFAULT NULL, date DATE DEFAULT NULL, INDEX footwear_id (footwear_id), INDEX person_id (person_id), INDEX pants_id (pants_id), INDEX tshirt_id (tshirt_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE outfits ADD CONSTRAINT `outfits_ibfk_1` FOREIGN KEY (person_id) REFERENCES people (id)');
        $this->addSql('ALTER TABLE outfits ADD CONSTRAINT `outfits_ibfk_2` FOREIGN KEY (pants_id) REFERENCES pants (id)');
        $this->addSql('ALTER TABLE outfits ADD CONSTRAINT `outfits_ibfk_3` FOREIGN KEY (tshirt_id) REFERENCES tshirts (id)');
        $this->addSql('ALTER TABLE outfits ADD CONSTRAINT `outfits_ibfk_4` FOREIGN KEY (footwear_id) REFERENCES footwear (id)');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E2ADD6D8C');
        $this->addSql('ALTER TABLE outfit DROP FOREIGN KEY FK_320296013147C936');
        $this->addSql('ALTER TABLE outfit DROP FOREIGN KEY FK_320296013A9532DD');
        $this->addSql('ALTER TABLE outfit DROP FOREIGN KEY FK_32029601D55839F1');
        $this->addSql('ALTER TABLE outfit DROP FOREIGN KEY FK_3202960174D452');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE outfit');
        $this->addSql('DROP TABLE supplier');
        $this->addSql('ALTER TABLE footwear CHANGE brand brand VARCHAR(50) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE color color VARCHAR(20) DEFAULT NULL, CHANGE price price NUMERIC(6, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE pants CHANGE brand brand VARCHAR(50) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE color color VARCHAR(20) DEFAULT NULL, CHANGE price price NUMERIC(6, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE people CHANGE name name VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE tshirts CHANGE brand brand VARCHAR(50) DEFAULT NULL, CHANGE size size VARCHAR(5) DEFAULT NULL, CHANGE color color VARCHAR(20) DEFAULT NULL, CHANGE price price NUMERIC(6, 2) DEFAULT NULL');
    }
}
