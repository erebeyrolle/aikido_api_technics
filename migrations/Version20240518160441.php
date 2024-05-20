<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240518160441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Attacks & Positions Tables Modifying Field Type';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attacks CHANGE attack_type_explanations attack_type_explanations LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE positions CHANGE working_shape_explanations working_shape_explanations LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE attacks CHANGE attack_type_explanations attack_type_explanations VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE positions CHANGE working_shape_explanations working_shape_explanations VARCHAR(255) NOT NULL');
    }
}
