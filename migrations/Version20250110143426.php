<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250110143426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poi ADD gallery_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poi ADD CONSTRAINT FK_7DBB1FD64E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7DBB1FD64E7AF8F ON poi (gallery_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poi DROP FOREIGN KEY FK_7DBB1FD64E7AF8F');
        $this->addSql('DROP INDEX UNIQ_7DBB1FD64E7AF8F ON poi');
        $this->addSql('ALTER TABLE poi DROP gallery_id');
    }
}
