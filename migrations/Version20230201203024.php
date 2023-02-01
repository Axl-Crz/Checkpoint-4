<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201203024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu_dishes (menu_id INT NOT NULL, dishes_id INT NOT NULL, INDEX IDX_8B0A8B85CCD7E912 (menu_id), INDEX IDX_8B0A8B85A05DD37A (dishes_id), PRIMARY KEY(menu_id, dishes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE menu_dishes ADD CONSTRAINT FK_8B0A8B85CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_dishes ADD CONSTRAINT FK_8B0A8B85A05DD37A FOREIGN KEY (dishes_id) REFERENCES dishes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dishes ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE dishes ADD CONSTRAINT FK_584DD35D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_584DD35D12469DE2 ON dishes (category_id)');
        $this->addSql('ALTER TABLE menu ADD week_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93C86F3B2F FOREIGN KEY (week_id) REFERENCES week (id)');
        $this->addSql('CREATE INDEX IDX_7D053A93C86F3B2F ON menu (week_id)');
        $this->addSql('ALTER TABLE week ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE week ADD CONSTRAINT FK_5B5A69C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5B5A69C0A76ED395 ON week (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_dishes DROP FOREIGN KEY FK_8B0A8B85CCD7E912');
        $this->addSql('ALTER TABLE menu_dishes DROP FOREIGN KEY FK_8B0A8B85A05DD37A');
        $this->addSql('DROP TABLE menu_dishes');
        $this->addSql('ALTER TABLE dishes DROP FOREIGN KEY FK_584DD35D12469DE2');
        $this->addSql('DROP INDEX IDX_584DD35D12469DE2 ON dishes');
        $this->addSql('ALTER TABLE dishes DROP category_id');
        $this->addSql('ALTER TABLE week DROP FOREIGN KEY FK_5B5A69C0A76ED395');
        $this->addSql('DROP INDEX IDX_5B5A69C0A76ED395 ON week');
        $this->addSql('ALTER TABLE week DROP user_id');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93C86F3B2F');
        $this->addSql('DROP INDEX IDX_7D053A93C86F3B2F ON menu');
        $this->addSql('ALTER TABLE menu DROP week_id');
    }
}
