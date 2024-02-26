<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240226025648 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact ALTER city DROP NOT NULL');
        $this->addSql('ALTER TABLE contact ALTER street DROP NOT NULL');
        $this->addSql('ALTER TABLE contact ALTER phone TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE contact ALTER phone DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contact ALTER city SET NOT NULL');
        $this->addSql('ALTER TABLE contact ALTER street SET NOT NULL');
        $this->addSql('ALTER TABLE contact ALTER phone TYPE INT');
        $this->addSql('ALTER TABLE contact ALTER phone SET NOT NULL');
    }
}
