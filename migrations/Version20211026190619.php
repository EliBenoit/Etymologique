<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211026190619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, description_id_id INT NOT NULL, name_id_id INT NOT NULL, image_id_id INT NOT NULL, INDEX IDX_161498D3656842B5 (description_id_id), INDEX IDX_161498D3B162CC12 (name_id_id), INDEX IDX_161498D368011AFE (image_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE description (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE name (id INT AUTO_INCREMENT NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3656842B5 FOREIGN KEY (description_id_id) REFERENCES description (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3B162CC12 FOREIGN KEY (name_id_id) REFERENCES name (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D368011AFE FOREIGN KEY (image_id_id) REFERENCES image (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3656842B5');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D368011AFE');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3B162CC12');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE description');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE name');
    }
}
