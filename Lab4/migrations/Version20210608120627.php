<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210608120627 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE article_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE review_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE article (id INT NOT NULL, email_user_id INT NOT NULL, name VARCHAR(255) NOT NULL, annotation VARCHAR(255) NOT NULL, text VARCHAR(1000) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, count_visit INT NOT NULL, count_review INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_23A0E661AAEBB5A ON article (email_user_id)');
        $this->addSql('CREATE TABLE review (id INT NOT NULL, email_user_id INT NOT NULL, name_article_id INT NOT NULL, text VARCHAR(500) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_794381C61AAEBB5A ON review (email_user_id)');
        $this->addSql('CREATE INDEX IDX_794381C6EA3A561E ON review (name_article_id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E661AAEBB5A FOREIGN KEY (email_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C61AAEBB5A FOREIGN KEY (email_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6EA3A561E FOREIGN KEY (name_article_id) REFERENCES article (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE review DROP CONSTRAINT FK_794381C6EA3A561E');
        $this->addSql('DROP SEQUENCE article_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE review_id_seq CASCADE');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE review');
    }
}
