<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220318103226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account_history (id INT AUTO_INCREMENT NOT NULL, id_bank_account_id INT DEFAULT NULL, date DATETIME DEFAULT NULL, operation INT DEFAULT NULL, INDEX IDX_EE916403FB955A84 (id_bank_account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(25) NOT NULL, text LONGBLOB NOT NULL, picture LONGBLOB DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bank_account (id INT AUTO_INCREMENT NOT NULL, amount INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clean_state (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contest (id INT AUTO_INCREMENT NOT NULL, id_infrastructure_id INT DEFAULT NULL, start_date DATETIME NOT NULL, end_date DATETIME DEFAULT NULL, INDEX IDX_1A95CB5D5091293 (id_infrastructure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disease (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equestrian_center (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, capacity INT NOT NULL, INDEX IDX_317772A79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equestrian_center_task (equestrian_center_id INT NOT NULL, task_id INT NOT NULL, INDEX IDX_4086E288B0366CF3 (equestrian_center_id), INDEX IDX_4086E2888DB60186 (task_id), PRIMARY KEY(equestrian_center_id, task_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, datetime DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exhaust_state (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE health_state (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horse (id INT AUTO_INCREMENT NOT NULL, id_exhaust_state_id INT DEFAULT NULL, id_health_state_id INT DEFAULT NULL, id_stress_state_id INT DEFAULT NULL, id_moral_state_id INT DEFAULT NULL, id_hunger_state_id INT DEFAULT NULL, id_clean_state_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, name VARCHAR(60) NOT NULL, race VARCHAR(60) NOT NULL, description LONGTEXT NOT NULL, speed INT DEFAULT NULL, stamina INT DEFAULT NULL, jump_height INT DEFAULT NULL, strength INT DEFAULT NULL, sociability INT DEFAULT NULL, intelligence INT DEFAULT NULL, temperament INT DEFAULT NULL, experience INT DEFAULT NULL, level INT DEFAULT NULL, general_stat INT DEFAULT NULL, INDEX IDX_629A2F18874001 (id_exhaust_state_id), INDEX IDX_629A2F184A382E7 (id_health_state_id), INDEX IDX_629A2F18799F955 (id_stress_state_id), INDEX IDX_629A2F18A198EBBA (id_moral_state_id), INDEX IDX_629A2F186B07C59A (id_hunger_state_id), INDEX IDX_629A2F18ABBC06BA (id_clean_state_id), INDEX IDX_629A2F1879F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hunger_state (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infrastructure (id INT AUTO_INCREMENT NOT NULL, equestrian_center_id INT DEFAULT NULL, type VARCHAR(20) NOT NULL, level INT DEFAULT NULL, description LONGBLOB DEFAULT NULL, family VARCHAR(20) DEFAULT NULL, price INT DEFAULT NULL, resources INT DEFAULT NULL, capacity_items INT DEFAULT NULL, capacity_horse INT DEFAULT NULL, INDEX IDX_D129B190B0366CF3 (equestrian_center_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infrastructure_item (infrastructure_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_9949D2DB243E7A84 (infrastructure_id), INDEX IDX_9949D2DB126F525E (item_id), PRIMARY KEY(infrastructure_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE injury (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item (id INT AUTO_INCREMENT NOT NULL, id_item_family_id INT DEFAULT NULL, type VARCHAR(20) DEFAULT NULL, level INT DEFAULT NULL, description LONGBLOB DEFAULT NULL, price INT DEFAULT NULL, INDEX IDX_1F1B251EF2E2FD9C (id_item_family_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_contest (item_id INT NOT NULL, contest_id INT NOT NULL, INDEX IDX_AF47AE1126F525E (item_id), INDEX IDX_AF47AE11CD0F0DE (contest_id), PRIMARY KEY(item_id, contest_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_family (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE moral_state (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newspaper (id INT AUTO_INCREMENT NOT NULL, miscellaenous_id INT DEFAULT NULL, meteo_id INT DEFAULT NULL, ad_id INT DEFAULT NULL, date DATE NOT NULL, UNIQUE INDEX UNIQ_C6E2E686CCAFC0F0 (miscellaenous_id), UNIQUE INDEX UNIQ_C6E2E686CC6645DC (meteo_id), UNIQUE INDEX UNIQ_C6E2E6864F34D596 (ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newspaper_event (newspaper_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_37BF40C0C5D975FA (newspaper_id), INDEX IDX_37BF40C071F7E88B (event_id), PRIMARY KEY(newspaper_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parasit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE riding_club (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, capacity INT NOT NULL, INDEX IDX_C381A97279F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE riding_club_item (riding_club_id INT NOT NULL, item_id INT NOT NULL, INDEX IDX_F16F451FD44ECDDB (riding_club_id), INDEX IDX_F16F451F126F525E (item_id), PRIMARY KEY(riding_club_id, item_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE riding_club_infrastructure (riding_club_id INT NOT NULL, infrastructure_id INT NOT NULL, INDEX IDX_190D192AD44ECDDB (riding_club_id), INDEX IDX_190D192A243E7A84 (infrastructure_id), PRIMARY KEY(riding_club_id, infrastructure_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stress_state (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, item_id INT DEFAULT NULL, action VARCHAR(25) DEFAULT NULL, frequency INT DEFAULT NULL, INDEX IDX_527EDB25126F525E (item_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, id_bank_account_id INT NOT NULL, username VARCHAR(40) NOT NULL, mail VARCHAR(80) NOT NULL, password VARCHAR(150) NOT NULL, first_name VARCHAR(60) DEFAULT NULL, last_name VARCHAR(60) DEFAULT NULL, gender VARCHAR(1) DEFAULT NULL, birth_date DATE NOT NULL, phone_number VARCHAR(20) DEFAULT NULL, adress VARCHAR(150) DEFAULT NULL, avatar LONGBLOB DEFAULT NULL, description LONGTEXT DEFAULT NULL, website VARCHAR(100) DEFAULT NULL, create_date DATETIME DEFAULT NULL, last_login DATETIME DEFAULT NULL, ip_adress VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649FB955A84 (id_bank_account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE account_history ADD CONSTRAINT FK_EE916403FB955A84 FOREIGN KEY (id_bank_account_id) REFERENCES bank_account (id)');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB5D5091293 FOREIGN KEY (id_infrastructure_id) REFERENCES infrastructure (id)');
        $this->addSql('ALTER TABLE equestrian_center ADD CONSTRAINT FK_317772A79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE equestrian_center_task ADD CONSTRAINT FK_4086E288B0366CF3 FOREIGN KEY (equestrian_center_id) REFERENCES equestrian_center (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equestrian_center_task ADD CONSTRAINT FK_4086E2888DB60186 FOREIGN KEY (task_id) REFERENCES task (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F18874001 FOREIGN KEY (id_exhaust_state_id) REFERENCES exhaust_state (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F184A382E7 FOREIGN KEY (id_health_state_id) REFERENCES health_state (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F18799F955 FOREIGN KEY (id_stress_state_id) REFERENCES stress_state (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F18A198EBBA FOREIGN KEY (id_moral_state_id) REFERENCES moral_state (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F186B07C59A FOREIGN KEY (id_hunger_state_id) REFERENCES hunger_state (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F18ABBC06BA FOREIGN KEY (id_clean_state_id) REFERENCES clean_state (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F1879F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE infrastructure ADD CONSTRAINT FK_D129B190B0366CF3 FOREIGN KEY (equestrian_center_id) REFERENCES equestrian_center (id)');
        $this->addSql('ALTER TABLE infrastructure_item ADD CONSTRAINT FK_9949D2DB243E7A84 FOREIGN KEY (infrastructure_id) REFERENCES infrastructure (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infrastructure_item ADD CONSTRAINT FK_9949D2DB126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251EF2E2FD9C FOREIGN KEY (id_item_family_id) REFERENCES item_family (id)');
        $this->addSql('ALTER TABLE item_contest ADD CONSTRAINT FK_AF47AE1126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE item_contest ADD CONSTRAINT FK_AF47AE11CD0F0DE FOREIGN KEY (contest_id) REFERENCES contest (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE newspaper ADD CONSTRAINT FK_C6E2E686CCAFC0F0 FOREIGN KEY (miscellaenous_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE newspaper ADD CONSTRAINT FK_C6E2E686CC6645DC FOREIGN KEY (meteo_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE newspaper ADD CONSTRAINT FK_C6E2E6864F34D596 FOREIGN KEY (ad_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE newspaper_event ADD CONSTRAINT FK_37BF40C0C5D975FA FOREIGN KEY (newspaper_id) REFERENCES newspaper (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE newspaper_event ADD CONSTRAINT FK_37BF40C071F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE riding_club ADD CONSTRAINT FK_C381A97279F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE riding_club_item ADD CONSTRAINT FK_F16F451FD44ECDDB FOREIGN KEY (riding_club_id) REFERENCES riding_club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE riding_club_item ADD CONSTRAINT FK_F16F451F126F525E FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE riding_club_infrastructure ADD CONSTRAINT FK_190D192AD44ECDDB FOREIGN KEY (riding_club_id) REFERENCES riding_club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE riding_club_infrastructure ADD CONSTRAINT FK_190D192A243E7A84 FOREIGN KEY (infrastructure_id) REFERENCES infrastructure (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D649FB955A84 FOREIGN KEY (id_bank_account_id) REFERENCES bank_account (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE newspaper DROP FOREIGN KEY FK_C6E2E686CCAFC0F0');
        $this->addSql('ALTER TABLE newspaper DROP FOREIGN KEY FK_C6E2E686CC6645DC');
        $this->addSql('ALTER TABLE newspaper DROP FOREIGN KEY FK_C6E2E6864F34D596');
        $this->addSql('ALTER TABLE account_history DROP FOREIGN KEY FK_EE916403FB955A84');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D649FB955A84');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F18ABBC06BA');
        $this->addSql('ALTER TABLE item_contest DROP FOREIGN KEY FK_AF47AE11CD0F0DE');
        $this->addSql('ALTER TABLE equestrian_center_task DROP FOREIGN KEY FK_4086E288B0366CF3');
        $this->addSql('ALTER TABLE infrastructure DROP FOREIGN KEY FK_D129B190B0366CF3');
        $this->addSql('ALTER TABLE newspaper_event DROP FOREIGN KEY FK_37BF40C071F7E88B');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F18874001');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F184A382E7');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F186B07C59A');
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB5D5091293');
        $this->addSql('ALTER TABLE infrastructure_item DROP FOREIGN KEY FK_9949D2DB243E7A84');
        $this->addSql('ALTER TABLE riding_club_infrastructure DROP FOREIGN KEY FK_190D192A243E7A84');
        $this->addSql('ALTER TABLE infrastructure_item DROP FOREIGN KEY FK_9949D2DB126F525E');
        $this->addSql('ALTER TABLE item_contest DROP FOREIGN KEY FK_AF47AE1126F525E');
        $this->addSql('ALTER TABLE riding_club_item DROP FOREIGN KEY FK_F16F451F126F525E');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25126F525E');
        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251EF2E2FD9C');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F18A198EBBA');
        $this->addSql('ALTER TABLE newspaper_event DROP FOREIGN KEY FK_37BF40C0C5D975FA');
        $this->addSql('ALTER TABLE riding_club_item DROP FOREIGN KEY FK_F16F451FD44ECDDB');
        $this->addSql('ALTER TABLE riding_club_infrastructure DROP FOREIGN KEY FK_190D192AD44ECDDB');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F18799F955');
        $this->addSql('ALTER TABLE equestrian_center_task DROP FOREIGN KEY FK_4086E2888DB60186');
        $this->addSql('ALTER TABLE equestrian_center DROP FOREIGN KEY FK_317772A79F37AE5');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F1879F37AE5');
        $this->addSql('ALTER TABLE riding_club DROP FOREIGN KEY FK_C381A97279F37AE5');
        $this->addSql('DROP TABLE account_history');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE bank_account');
        $this->addSql('DROP TABLE clean_state');
        $this->addSql('DROP TABLE contest');
        $this->addSql('DROP TABLE disease');
        $this->addSql('DROP TABLE equestrian_center');
        $this->addSql('DROP TABLE equestrian_center_task');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE exhaust_state');
        $this->addSql('DROP TABLE health_state');
        $this->addSql('DROP TABLE horse');
        $this->addSql('DROP TABLE hunger_state');
        $this->addSql('DROP TABLE infrastructure');
        $this->addSql('DROP TABLE infrastructure_item');
        $this->addSql('DROP TABLE injury');
        $this->addSql('DROP TABLE item');
        $this->addSql('DROP TABLE item_contest');
        $this->addSql('DROP TABLE item_family');
        $this->addSql('DROP TABLE moral_state');
        $this->addSql('DROP TABLE newspaper');
        $this->addSql('DROP TABLE newspaper_event');
        $this->addSql('DROP TABLE parasit');
        $this->addSql('DROP TABLE riding_club');
        $this->addSql('DROP TABLE riding_club_item');
        $this->addSql('DROP TABLE riding_club_infrastructure');
        $this->addSql('DROP TABLE stress_state');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE `user`');
    }
}
