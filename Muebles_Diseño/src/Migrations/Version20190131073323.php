<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190131073323 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nombre VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ofertas CHANGE Productos_id Productos_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE productos CHANGE Categorias_id Categorias_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE productos_has_materiales RENAME INDEX fk_productos_has_materiales_productos1_idx TO IDX_FC850EF7F5368D93');
        $this->addSql('ALTER TABLE productos_has_materiales RENAME INDEX fk_productos_has_materiales_materiales1_idx TO IDX_FC850EF7CD494AAB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE ofertas CHANGE Productos_id Productos_id INT NOT NULL');
        $this->addSql('ALTER TABLE productos CHANGE Categorias_id Categorias_id INT NOT NULL');
        $this->addSql('ALTER TABLE productos_has_materiales RENAME INDEX idx_fc850ef7cd494aab TO fk_Productos_has_Materiales_Materiales1_idx');
        $this->addSql('ALTER TABLE productos_has_materiales RENAME INDEX idx_fc850ef7f5368d93 TO fk_Productos_has_Materiales_Productos1_idx');
    }
}
