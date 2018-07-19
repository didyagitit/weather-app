<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180719124929 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE forecast (id INT AUTO_INCREMENT NOT NULL, city_id INT DEFAULT NULL, temperature VARCHAR(255) NOT NULL, humidity VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, weather_datetime DATETIME NOT NULL, INDEX IDX_2A9C78448BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cities_users (user_id INT NOT NULL, city_id INT NOT NULL, INDEX IDX_6A104E88A76ED395 (user_id), INDEX IDX_6A104E888BAC62AF (city_id), PRIMARY KEY(user_id, city_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, openweather_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forecast ADD CONSTRAINT FK_2A9C78448BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE cities_users ADD CONSTRAINT FK_6A104E88A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cities_users ADD CONSTRAINT FK_6A104E888BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cities_users DROP FOREIGN KEY FK_6A104E88A76ED395');
        $this->addSql('ALTER TABLE forecast DROP FOREIGN KEY FK_2A9C78448BAC62AF');
        $this->addSql('ALTER TABLE cities_users DROP FOREIGN KEY FK_6A104E888BAC62AF');
        $this->addSql('DROP TABLE forecast');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE cities_users');
        $this->addSql('DROP TABLE city');
    }
}
