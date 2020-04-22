<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200421135454 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3E00EE68D');
        $this->addSql('DROP INDEX IDX_AC6340B3E00EE68D ON `like`');
        $this->addSql('ALTER TABLE `like` CHANGE id_product id_product_id INT NOT NULL');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3E00EE68D ON `like` (id_product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B3E00EE68D');
        $this->addSql('DROP INDEX IDX_AC6340B3E00EE68D ON `like`');
        $this->addSql('ALTER TABLE `like` CHANGE id_product_id id_product INT NOT NULL');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B3E00EE68D FOREIGN KEY (id_product) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_AC6340B3E00EE68D ON `like` (id_product)');
    }
}
