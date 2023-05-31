<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230524111531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE accompagner (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accompagner_enseignant (accompagner_id INT NOT NULL, enseignant_id INT NOT NULL, INDEX IDX_661B625652400177 (accompagner_id), INDEX IDX_661B6256E455FCC0 (enseignant_id), PRIMARY KEY(accompagner_id, enseignant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE accompagner_projet (accompagner_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_1ECE0C652400177 (accompagner_id), INDEX IDX_1ECE0C6C18272 (projet_id), PRIMARY KEY(accompagner_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle_categorie VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, label_classe VARCHAR(255) NOT NULL, code_classe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir_projet (contenir_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_49D270381982B715 (contenir_id), INDEX IDX_49D27038C18272 (projet_id), PRIMARY KEY(contenir_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir_eleve (contenir_id INT NOT NULL, eleve_id INT NOT NULL, INDEX IDX_477BE5611982B715 (contenir_id), INDEX IDX_477BE561A6CC7B2 (eleve_id), PRIMARY KEY(contenir_id, eleve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, document_projet_id INT DEFAULT NULL, libelle_document VARCHAR(255) DEFAULT NULL, nom_fichier VARCHAR(255) DEFAULT NULL, INDEX IDX_D8698A7612F9AAD3 (document_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT AUTO_INCREMENT NOT NULL, id_classe_id INT DEFAULT NULL, id_groupe_id INT DEFAULT NULL, nom_eleve VARCHAR(255) NOT NULL, prenom_eleve VARCHAR(255) NOT NULL, sexe_eleve VARCHAR(255) NOT NULL, date_naissance_eleve DATE NOT NULL, photo_eleve VARCHAR(255) NOT NULL, INDEX IDX_ECA105F7F6B192E (id_classe_id), INDEX IDX_ECA105F7FA7089AB (id_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, nom_enseignant VARCHAR(255) DEFAULT NULL, prenom_enseignant VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE financement (id INT AUTO_INCREMENT NOT NULL, libelle_financement VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, libelle_groupe VARCHAR(255) NOT NULL, code_groupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, libelle_niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, transport_projet_id INT DEFAULT NULL, enseignant_projet_id INT DEFAULT NULL, categorie_projet_id INT DEFAULT NULL, financement_projet_id INT DEFAULT NULL, adresse_projet VARCHAR(255) NOT NULL, code_postal_projet INT NOT NULL, ville_projet VARCHAR(255) NOT NULL, nom_projet VARCHAR(255) NOT NULL, duree_projet VARCHAR(255) DEFAULT NULL, cout_projet DOUBLE PRECISION DEFAULT NULL, cout_transport DOUBLE PRECISION DEFAULT NULL, cout_global_projet DOUBLE PRECISION DEFAULT NULL, cout_etudiant_projet DOUBLE PRECISION DEFAULT NULL, besoin_sandwich VARCHAR(255) DEFAULT NULL, pre_validation_projet TINYINT(1) DEFAULT NULL, validation_projet TINYINT(1) DEFAULT NULL, date_demande_projet DATETIME NOT NULL, heure_debut_sortie DATETIME DEFAULT NULL, heure_fin_sortie DATETIME DEFAULT NULL, jour_sortie DATE DEFAULT NULL, date_debut_voyage DATE DEFAULT NULL, date_fin_voyage DATE DEFAULT NULL, INDEX IDX_50159CA9960204E9 (transport_projet_id), INDEX IDX_50159CA9D8660021 (enseignant_projet_id), INDEX IDX_50159CA9AD9E8D75 (categorie_projet_id), INDEX IDX_50159CA9AE856952 (financement_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE transport (id INT AUTO_INCREMENT NOT NULL, libelle_transport VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE accompagner_enseignant ADD CONSTRAINT FK_661B625652400177 FOREIGN KEY (accompagner_id) REFERENCES accompagner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagner_enseignant ADD CONSTRAINT FK_661B6256E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagner_projet ADD CONSTRAINT FK_1ECE0C652400177 FOREIGN KEY (accompagner_id) REFERENCES accompagner (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE accompagner_projet ADD CONSTRAINT FK_1ECE0C6C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_projet ADD CONSTRAINT FK_49D270381982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_projet ADD CONSTRAINT FK_49D27038C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_eleve ADD CONSTRAINT FK_477BE5611982B715 FOREIGN KEY (contenir_id) REFERENCES contenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contenir_eleve ADD CONSTRAINT FK_477BE561A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A7612F9AAD3 FOREIGN KEY (document_projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7F6B192E FOREIGN KEY (id_classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7FA7089AB FOREIGN KEY (id_groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9960204E9 FOREIGN KEY (transport_projet_id) REFERENCES transport (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9D8660021 FOREIGN KEY (enseignant_projet_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9AD9E8D75 FOREIGN KEY (categorie_projet_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9AE856952 FOREIGN KEY (financement_projet_id) REFERENCES financement (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE accompagner_enseignant DROP FOREIGN KEY FK_661B625652400177');
        $this->addSql('ALTER TABLE accompagner_enseignant DROP FOREIGN KEY FK_661B6256E455FCC0');
        $this->addSql('ALTER TABLE accompagner_projet DROP FOREIGN KEY FK_1ECE0C652400177');
        $this->addSql('ALTER TABLE accompagner_projet DROP FOREIGN KEY FK_1ECE0C6C18272');
        $this->addSql('ALTER TABLE contenir_projet DROP FOREIGN KEY FK_49D270381982B715');
        $this->addSql('ALTER TABLE contenir_projet DROP FOREIGN KEY FK_49D27038C18272');
        $this->addSql('ALTER TABLE contenir_eleve DROP FOREIGN KEY FK_477BE5611982B715');
        $this->addSql('ALTER TABLE contenir_eleve DROP FOREIGN KEY FK_477BE561A6CC7B2');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A7612F9AAD3');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7F6B192E');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7FA7089AB');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9960204E9');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9D8660021');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9AD9E8D75');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9AE856952');
        $this->addSql('DROP TABLE accompagner');
        $this->addSql('DROP TABLE accompagner_enseignant');
        $this->addSql('DROP TABLE accompagner_projet');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE contenir');
        $this->addSql('DROP TABLE contenir_projet');
        $this->addSql('DROP TABLE contenir_eleve');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE financement');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE transport');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
