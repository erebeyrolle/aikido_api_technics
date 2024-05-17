<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240516140412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation between Technics & TechnicForms tables creation';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technics ADD technic_form_id INT NOT NULL');
        $this->addSql('ALTER TABLE technics ADD CONSTRAINT FK_A8B70A44CAC87B86 FOREIGN KEY (technic_form_id) REFERENCES technic_forms (id)');
        $this->addSql('CREATE INDEX IDX_A8B70A44CAC87B86 ON technics (technic_form_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technics DROP FOREIGN KEY FK_A8B70A44CAC87B86');
        $this->addSql('DROP INDEX IDX_A8B70A44CAC87B86 ON technics');
        $this->addSql('ALTER TABLE technics DROP technic_form_id');
    }
}
