<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240511173111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Technics Table Modifying Field Type';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technic_form CHANGE technic_form_explanations technic_form_explanations LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technic_form CHANGE technic_form_explanations technic_form_explanations VARCHAR(255) NOT NULL');
    }
}
