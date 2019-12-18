<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191201194150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE neighborhood (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD neighborhood_id INT DEFAULT NULL, CHANGE city_id city_id INT DEFAULT NULL, CHANGE zip_code_id zip_code_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66803BB24B FOREIGN KEY (neighborhood_id) REFERENCES neighborhood (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66803BB24B ON article (neighborhood_id)');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_rdv_cat CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66803BB24B');
        $this->addSql('DROP TABLE neighborhood');
        $this->addSql('DROP INDEX IDX_23A0E66803BB24B ON article');
        $this->addSql('ALTER TABLE article DROP neighborhood_id, CHANGE city_id city_id INT DEFAULT NULL, CHANGE zip_code_id zip_code_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_rdv_cat CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
    }
}
