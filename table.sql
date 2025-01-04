CREATE table Compte_Client(
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(20)
);
create table depot(
    id_depot INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT REFERENCES compte_client(id_client),
    Montant_depot DECIMAL(10, 2) NOT NULL,
    validation boolean
);
CREATE TABLE categories (
    id_category INT AUTO_INCREMENT PRIMARY KEY,
    nom_category VARCHAR(50) NOT NULL
);
CREATE TABLE produits (
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    nom_produit VARCHAR(100) NOT NULL,
    id_category INTEGER REFERENCES categories(id_category),
    prix DECIMAL(10, 2) NOT NULL,
    imgPath VARCHAR(30)
);
-- Insérer des clients dans la table Compte_Client
INSERT INTO Compte_Client (nom) VALUES
('Alice'),
('Bob'),
('Charlie'),
('Diana'),
('Edward');

-- Insérer des dépôts dans la table depot
INSERT INTO depot (id_client, Montant_depot, validation) VALUES
(1, 100.00, TRUE),
(2, 150.50, FALSE),
(3, 200.75, TRUE),
(4, 50.00, TRUE),
(5, 300.00, FALSE);

-- Insérer des catégories dans la table categories
INSERT INTO categories (nom_category) VALUES
('fille'),
('garcon'),
('neutre');

-- Insérer des produits dans la table produits
INSERT INTO produits (nom_produit, id_category, prix, imgPath) VALUES
-- Catégorie fille
('Poupée magique', 1, 25.99, 'img/poupee_magique.jpg'),
('Kit de maquillage', 1, 18.50, 'img/kit_maquillage.jpg'),
('Sac à dos licorne', 1, 15.99, 'img/sac_licorne.jpg'),
('Bracelet créatif', 1, 12.49, 'img/bracelet_creatif.jpg'),
('Boîte à bijoux musicale', 1, 20.00, 'img/boite_bijoux.jpg'),
('Jeu de société princesse', 1, 22.75, 'img/jeu_princesse.jpg'),
('Livre de contes', 1, 10.99, 'img/livre_contes.jpg'),
('Puzzle sirène', 1, 9.99, 'img/puzzle_sirene.jpg'),
('Set de peinture magique', 1, 17.50, 'img/peinture_magique.jpg'),
('Pyjama licorne', 1, 19.99, 'img/pyjama_licorne.jpg'),
-- Catégorie garcon
('Voiture télécommandée', 2, 35.99, 'img/voiture_telecommande.jpg'),
('Hélicoptère miniature', 2, 45.50, 'img/helicoptere.jpg'),
('Kit de construction robot', 2, 50.00, 'img/kit_robot.jpg'),
('Super héros figurine', 2, 15.75, 'img/super_heros.jpg'),
('Jeu de société pirate', 2, 25.00, 'img/jeu_pirate.jpg'),
('Balle rebondissante lumineuse', 2, 5.99, 'img/balle_lumineuse.jpg'),
('Gant de boxe enfant', 2, 30.00, 'img/gant_boxe.jpg'),
('Drone miniaturisé', 2, 55.99, 'img/drone_miniature.jpg'),
('Livre d aventures', 2, 12.50, 'img/livre_aventures.jpg'),
('Casse-tête 3D', 2, 22.50, 'img/casse_tete.jpg'),
-- Catégorie neutre
('Jeu d échecs', 3, 29.99, 'img/jeu_echecs.jpg'),
('Tente d aventure', 3, 45.00, 'img/tente_aventure.jpg'),
('Kit de jardinage enfant', 3, 15.99, 'img/kit_jardinage.jpg'),
('Carnet de dessin', 3, 8.99, 'img/carnet_dessin.jpg'),
('Lego créatif', 3, 40.00, 'img/lego_creatif.jpg'),
('Mini globe terrestre', 3, 12.99, 'img/mini_globe.jpg'),
('Jeu de mémoire', 3, 10.50, 'img/jeu_memoire.jpg'),
('Tambour enfant', 3, 20.00, 'img/tambour.jpg'),
('Puzzle géographique', 3, 18.75, 'img/puzzle_geo.jpg'),
('Toupie lumineuse', 3, 6.99, 'img/toupie_lumineuse.jpg'),
('Cahier de coloriage', 3, 5.50, 'img/cahier_coloriage.jpg'),
('Kit de slime', 3, 7.99, 'img/kit_slime.jpg'),
('Gourde personnalisable', 3, 11.50, 'img/gourde.jpg'),
('Lanterne magique', 3, 25.99, 'img/lanterne.jpg'),
('Jeu de cartes éducatif', 3, 14.50, 'img/jeu_cartes.jpg'),
('Casque de réalité virtuelle enfant', 3, 65.99, 'img/casque_vr.jpg'),
('Bande dessinée éducative', 3, 9.99, 'img/bd_educative.jpg'),
('Boîte à musique', 3, 20.00, 'img/boite_musique.jpg'),
('Ballon de sport', 3, 15.00, 'img/ballon_sport.jpg'),
('Guitare enfant', 3, 35.99, 'img/guitare.jpg'),
('Mini microscope', 3, 28.50, 'img/microscope.jpg'),
('Lunettes de soleil enfant', 3, 10.00, 'img/lunettes.jpg');

create view argent_client as (select *from compte_client)

select d.id_client,sum(montant_depot) 
from compte_client c left join 
depot d on d.id_client=c.id_client where d.validation=true group by d.id_client 