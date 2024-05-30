<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529142330 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Relation between Technics & TechnicForms tables creation ManyToMany';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE technics_technic_forms (technics_id INT NOT NULL, technic_forms_id INT NOT NULL, INDEX IDX_6F82ABA7BE382E21 (technics_id), INDEX IDX_6F82ABA7E360534B (technic_forms_id), PRIMARY KEY(technics_id, technic_forms_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE technics_technic_forms ADD CONSTRAINT FK_6F82ABA7BE382E21 FOREIGN KEY (technics_id) REFERENCES technics (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technics_technic_forms ADD CONSTRAINT FK_6F82ABA7E360534B FOREIGN KEY (technic_forms_id) REFERENCES technic_forms (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE technics_technic_forms DROP FOREIGN KEY FK_6F82ABA7BE382E21');
        $this->addSql('ALTER TABLE technics_technic_forms DROP FOREIGN KEY FK_6F82ABA7E360534B');
        $this->addSql('DROP TABLE technics_technic_forms');
    }
}
