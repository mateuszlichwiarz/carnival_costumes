<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220000232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE open_hours_id_seq CASCADE');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76F85E0677 ON admin (username)');
        $this->addSql('CREATE TABLE open_hours (day INT NOT NULL, is_closed BOOLEAN NOT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(day))');
        $this->addSql('CREATE TABLE pricing (id INT NOT NULL, min_price INT NOT NULL, max_price INT NOT NULL, deposit INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE visits (id INT NOT NULL, month INT NOT NULL, week INT NOT NULL, year INT NOT NULL, visits INT NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE open_hours_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE open_hours');
        $this->addSql('DROP TABLE pricing');
        $this->addSql('DROP TABLE visits');
    }
}
