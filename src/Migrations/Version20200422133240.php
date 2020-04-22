<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200422133240 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD4584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE610C6A2');
        $this->addSql('DROP TABLE like_product');
        $this->addSql('DROP INDEX IDX_D34A04AD4584665A ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADE610C6A2 ON product');
        $this->addSql('ALTER TABLE product DROP like_product_id, DROP product_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE like_product (id INT AUTO_INCREMENT NOT NULL, userid INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product ADD like_product_id INT DEFAULT NULL, ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD4584665A FOREIGN KEY (product_id) REFERENCES like_product (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE610C6A2 FOREIGN KEY (like_product_id) REFERENCES like_product (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD4584665A ON product (product_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADE610C6A2 ON product (like_product_id)');
    }
}
