<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112110055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE neighborhood CHANGE city_id city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649803BB24B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6498BAC62AF');
        $this->addSql('DROP INDEX IDX_8D93D649803BB24B ON user');
        $this->addSql('DROP INDEX IDX_8D93D6498BAC62AF ON user');
        $this->addSql('ALTER TABLE user DROP city_id, DROP neighborhood_id, DROP name, DROP lastname');
        $this->addSql('ALTER TABLE private_rdv_cat CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE neighborhood CHANGE city_id city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_rdv_cat CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD city_id INT DEFAULT NULL, ADD neighborhood_id INT DEFAULT NULL, ADD name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649803BB24B FOREIGN KEY (neighborhood_id) REFERENCES neighborhood (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6498BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649803BB24B ON user (neighborhood_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6498BAC62AF ON user (city_id)');
    }
}
