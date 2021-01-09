<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210109175222 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, full_name VARCHAR(50) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', confirmation_token VARCHAR(200) DEFAULT NULL, enabled TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE following (user_id INT NOT NULL, following_user_id INT NOT NULL, INDEX IDX_71BF8DE3A76ED395 (user_id), INDEX IDX_71BF8DE31896F387 (following_user_id), PRIMARY KEY(user_id, following_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE micro_post (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, text VARCHAR(280) NOT NULL, time DATETIME NOT NULL, INDEX IDX_2AEFE017A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE micro_post_user (micro_post_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_19DCF74D11E37CEA (micro_post_id), INDEX IDX_19DCF74DA76ED395 (user_id), PRIMARY KEY(micro_post_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, micro_post_id INT DEFAULT NULL, liked_by_id INT DEFAULT NULL, seen TINYINT(1) NOT NULL, discr VARCHAR(255) NOT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), INDEX IDX_BF5476CA11E37CEA (micro_post_id), INDEX IDX_BF5476CAB4622EC2 (liked_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE following ADD CONSTRAINT FK_71BF8DE3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE following ADD CONSTRAINT FK_71BF8DE31896F387 FOREIGN KEY (following_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE micro_post ADD CONSTRAINT FK_2AEFE017A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE micro_post_user ADD CONSTRAINT FK_19DCF74D11E37CEA FOREIGN KEY (micro_post_id) REFERENCES micro_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE micro_post_user ADD CONSTRAINT FK_19DCF74DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA11E37CEA FOREIGN KEY (micro_post_id) REFERENCES micro_post (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAB4622EC2 FOREIGN KEY (liked_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE following DROP FOREIGN KEY FK_71BF8DE3A76ED395');
        $this->addSql('ALTER TABLE following DROP FOREIGN KEY FK_71BF8DE31896F387');
        $this->addSql('ALTER TABLE micro_post DROP FOREIGN KEY FK_2AEFE017A76ED395');
        $this->addSql('ALTER TABLE micro_post_user DROP FOREIGN KEY FK_19DCF74DA76ED395');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAB4622EC2');
        $this->addSql('ALTER TABLE micro_post_user DROP FOREIGN KEY FK_19DCF74D11E37CEA');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA11E37CEA');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE following');
        $this->addSql('DROP TABLE micro_post');
        $this->addSql('DROP TABLE micro_post_user');
        $this->addSql('DROP TABLE notification');
    }
}
