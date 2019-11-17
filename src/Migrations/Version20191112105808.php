<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112105808 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B023468059DBF');
        $this->addSql('CREATE TABLE neighborhood (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_FEF1E9EE8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE neighborhood ADD CONSTRAINT FK_FEF1E9EE8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('DROP TABLE gov');
        $this->addSql('DROP TABLE zip_code');
        $this->addSql('DROP INDEX IDX_2D5B023468059DBF ON city');
        $this->addSql('ALTER TABLE city DROP gov_id, CHANGE name_city name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD city_id INT DEFAULT NULL, ADD neighborhood_id INT DEFAULT NULL, ADD name VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649803BB24B FOREIGN KEY (neighborhood_id) REFERENCES neighborhood (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498BAC62AF ON user (city_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649803BB24B ON user (neighborhood_id)');
        $this->addSql('ALTER TABLE private_rdv_cat CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649803BB24B');
        $this->addSql('CREATE TABLE gov (id INT AUTO_INCREMENT NOT NULL, article_id INT DEFAULT NULL, gov_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_E9DAA7D67294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE zip_code (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_A1ACE1588BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE gov ADD CONSTRAINT FK_E9DAA7D67294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE zip_code ADD CONSTRAINT FK_A1ACE1588BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('DROP TABLE neighborhood');
        $this->addSql('ALTER TABLE city ADD gov_id INT DEFAULT NULL, CHANGE name name_city VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B023468059DBF FOREIGN KEY (gov_id) REFERENCES gov (id)');
        $this->addSql('CREATE INDEX IDX_2D5B023468059DBF ON city (gov_id)');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_rdv_cat CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('DROP INDEX IDX_8D93D6498BAC62AF ON user');
        $this->addSql('DROP INDEX IDX_8D93D649803BB24B ON user');
        $this->addSql('ALTER TABLE user DROP city_id, DROP neighborhood_id, DROP name, DROP lastname');
    }
}
