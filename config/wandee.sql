-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 19 Août 2013 à 20:28
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

--
-- Base de données: wandee
--

-- --------------------------------------------------------

--
-- Structure de la table plat
--
DROP TABLE IF EXISTS mealreserved;
DROP TABLE IF EXISTS plat;
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS user;


CREATE TABLE IF NOT EXISTS plat (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  type varchar(10) NOT NULL,
  description varchar(100) NOT NULL,
  price1 decimal(10,2) NOT NULL,
  price2 decimal(10,2) NOT NULL,
  price3 decimal(10,2) NOT NULL,
  piment int(2) NOT NULL,
  imageLink varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Contenu de la table plat
--

INSERT INTO plat (name, type, description, price1, price2, price3, piment, imageLink) VALUES
('Brochettes de poulet', 'entree', '', '1.00', '1.00', '1.00', 0, 'photo1.jpg'),
('Rouleau de printemps', 'entree', '', '2.00', '2.00', '2.00', 0, 'photo1.jpg'),
('Popia aux légumes', 'entree', '', '0.60', '0.60', '0.60', 0, 'photo1.jpg'),
('Popia au porc', 'entree', '', '1.05', '1.05', '1.05', 0, 'photo1.jpg'),
('Popia au poulet', 'entree', '', '1.05', '1.05', '1.05', 0, 'photo1.jpg'),
('Popia au boeuf', 'entree', '', '1.25', '1.25', '1.25', 0, 'photo1.jpg'),
('Popia aux crevettes', 'entree', '', '1.25', '1.25', '1.25', 0, 'photo1.jpg'),
('Samoussa au boeuf', 'entree', '4 pièces', '1.10', '1.10', '1.10', 0, 'photo1.jpg'),
('Samoussa au poulet', 'entree', '4 pièces', '1.10', '1.10', '1.10', 0, 'photo1.jpg'),
('Pince de crabe', 'entree', '2 pièces', '1.50', '1.50', '1.50', 0, 'photo1.jpg'),
('Surimi de Saint Jacques', 'entree', '', '1.50', '1.50', '1.50', 0, 'photo1.jpg'),
('Beignet de crevettes', 'entree', '4 pièces', '3.10', '3.10', '3.10', 0, 'photo1.jpg'),
('Salade', 'entree', '', '4.00', '4.00', '4.00', 0, 'photo1.jpg'),
('Yam aux crevettes et seiches', 'entree', '', '6.60', '6.60', '6.60', 0, 'photo1.jpg'),
('Bô Bun', 'entree', '', '6.90', '6.90', '6.90', 0, 'photo1.jpg'),
('Poulet vapeur au curry rouge', 'plat', '', '4.80', '1.00', '1.00', 0, 'photo1.jpg'),
('Cuisse de poulet à la citronnelle', 'plat', '', '5.00', '1.00', '1.00', 0, 'photo1.jpg'),
('Canard laqué sauce barbecue', 'plat', '', '5.50', '1.00', '1.00', 0, 'photo1.jpg'),
('Aubergine farcie', 'plat', '', '5.50', '1.00', '1.00', 0, 'photo1.jpg'),
('Sauté de légumes', 'plat', '', '5.00', '1.00', '1.00', 0, 'photo1.jpg'),
('Sauté de viande', 'plat', '', '5.60', '1.00', '1.00', 0, 'photo1.jpg'),
('Sauté de crevettes', 'plat', '', '6.90', '1.00', '1.00', 0, 'photo1.jpg'),
('Vermicelles sauté au porc', 'plat2', '', '5.50', '1.00', '1.00', 0, 'photo1.jpg'),
('Vermicelles sauté au poulet', 'plat2', '', '5.50', '1.00', '1.00', 0, 'photo1.jpg'),
('Riz sauté au poulet à la Thaï', 'plat2', '', '5.50', '1.00', '1.00', 0, 'photo1.jpg'),
('Pad Thaï', 'plat2', '', '8.90', '1.00', '1.00', 0, 'photo1.jpg'),
('Riz nature', 'accompagnement', '', '2.00', '1.00', '1.00', 0, 'photo1.jpg'),
('Riz cantonais', 'accompagnement', '', '2.80', '1.00', '1.00', 0, 'photo1.jpg'),
('Nouilles sautées', 'accompagnement', '', '2.80', '1.00', '1.00', 0, 'photo1.jpg'),
('Gâteau', 'dessert', '', '1.30', '1.00', '1.00', 0, 'photo1.jpg'),
('Nouget dur', 'dessert', '', '1.30', '1.00', '1.00', 0, 'photo1.jpg'),
('Nouget mou', 'dessert', '', '1.50', '1.00', '1.00', 0, 'photo1.jpg'),
('Gingembre confit', 'dessert', '', '2.80', '1.00', '1.00', 0, 'photo1.jpg'),
('Fruit frais', 'dessert', '', '3.00', '1.00', '1.00', 0, 'photo1.jpg'),
('Coca cola (33cl)', 'boisson', '', '1.00', '1.00', '1.00', 0, 'photo1.jpg'),
('Orangina (33cl)', 'boisson', '', '1.00', '1.00', '1.00', 0, 'photo1.jpg'),
('Jus d''orange (33cl)', 'boisson', '', '1.00', '1.00', '1.00', 0, 'photo1.jpg');
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS reservation (
  id int NOT NULL AUTO_INCREMENT,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  telephone int(10) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Structure de la table reservation
--
CREATE TABLE IF NOT EXISTS mealreserved (
  idReservation int NOT NULL,
  idPlat int NOT NULL,
  quantity int NOT NULL,
  PRIMARY KEY (idReservation, idPlat)
);

-- --------------------------------------------------------

--
-- Structure de la table user
--
CREATE TABLE IF NOT EXISTS user (
  id int NOT NULL AUTO_INCREMENT,
  login varchar(20) NOT NULL,
  password varchar(50) NOT NULL,
  PRIMARY KEY (id)
);

alter table mealreserved add constraint FK_idReservation_id foreign key (idReservation)
references reservation (id) on delete restrict on update restrict;

alter table mealreserved add constraint FK_idPlat_id foreign key (idPlat)
references plat (id) on delete restrict on update restrict;