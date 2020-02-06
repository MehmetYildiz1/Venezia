<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200205075619 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bestelregel ADD ijsrecept_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bestelregel ADD CONSTRAINT FK_8D814692419D26EA FOREIGN KEY (ijsrecept_id) REFERENCES ijsrecept (id)');
        $this->addSql('CREATE INDEX IDX_8D814692419D26EA ON bestelregel (ijsrecept_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bestelregel DROP FOREIGN KEY FK_8D814692419D26EA');
        $this->addSql('DROP INDEX IDX_8D814692419D26EA ON bestelregel');
        $this->addSql('ALTER TABLE bestelregel DROP ijsrecept_id');
    }
}
