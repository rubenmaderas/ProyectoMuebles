<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190211180025 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY fk_Productos_Categorias1');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT FK_767490E6E4ECF982 FOREIGN KEY (Categorias_id) REFERENCES categorias (id)');
        $this->addSql('ALTER TABLE user DROP nombre');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE productos DROP FOREIGN KEY FK_767490E6E4ECF982');
        $this->addSql('ALTER TABLE productos ADD CONSTRAINT fk_Productos_Categorias1 FOREIGN KEY (Categorias_id) REFERENCES categorias (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD nombre VARCHAR(100) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
