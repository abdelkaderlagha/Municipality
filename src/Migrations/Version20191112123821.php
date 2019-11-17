<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112123821 extends AbstractMigration
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
        $this->addSql('ALTER TABLE private_rdv_cat ADD description LONGTEXT NOT NULL, DROP name, CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment CHANGE article_id article_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE neighborhood CHANGE city_id city_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE private_rdv_cat ADD name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP description, CHANGE user_id user_id INT DEFAULT NULL, CHANGE officiel_id officiel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rate CHANGE article_id article_id INT DEFAULT NULL');
    }
}
