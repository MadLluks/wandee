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
SET time_zone = "+02:00";
--
-- Structure de la table plat
--
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS reservedmeal;
DROP TABLE IF EXISTS plat;
DROP TABLE IF EXISTS reservation;
DROP TABLE IF EXISTS goldbook;
DROP TABLE IF EXISTS reservationsurplace;


CREATE TABLE IF NOT EXISTS plat (
  id            int NOT NULL AUTO_INCREMENT,
  name          varchar(50) NOT NULL,
  type          varchar(10) NOT NULL,
  description   varchar(100) NOT NULL,
  price         decimal(10,2) NOT NULL,
  piment        int(2) NOT NULL,
  imageLink varchar(100) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Contenu de la table plat
--

INSERT INTO plat (name, type, description, price, piment, imageLink) VALUES
('Brochettes de poulet', 'entree', '', '1.00', 0, 'photo1.jpg'),
('Rouleau de printemps', 'entree', '', '2.00', 0, 'photo1.jpg'),
('Popia aux légumes', 'entree', '', '0.60', 0, 'IMG_1446.jpg'),
('Popia au porc', 'entree', '', '1.05', 0, 'IMG_1446.jpg'),
('Popia au poulet', 'entree', '', '1.05', 0, 'IMG_1446.jpg'),
('Popia au boeuf', 'entree', '', '1.25', 0, 'IMG_1446.jpg'),
('Popia aux crevettes', 'entree', '', '1.25', 0, 'IMG_1446.jpg'),
('Samoussa au boeuf', 'entree', '4 pièces', '1.10', 0, 'IMG_1437.jpg'),
('Samoussa au poulet', 'entree', '4 pièces', '1.10', 0, 'IMG_1437.jpg'),
('Pince de crabe', 'entree', '2 pièces', '1.50', 0, 'IMG_1441.jpg'),
('Surimi de Saint Jacques', 'entree', '', '1.50', 0, 'IMG_1443.jpg'),
('Beignet de crevettes', 'entree', '4 pièces', '3.10', 0, 'IMG_1439.jpg'),
('Salade', 'entree', '', '4.00', 0, 'photo1.jpg'),
('Yam aux crevettes et seiches', 'entree', '', '6.60', 0, 'photo1.jpg'),
('Bô Bun', 'entree', '', '6.90', 0, 'IMG_1471.jpg'),

('Poulet vapeur au curry rouge', 'plat', '', '4.80', 0, 'photo1.jpg'),
('Cuisse de poulet à la citronnelle', 'plat', '', '5.00', 0, 'IMG_1461.jpg'),
('Canard laqué sauce barbecue', 'plat', '', '5.50', 0, 'IMG_1458.jpg'),
('Aubergine farcie', 'plat', '', '5.50', 0, 'photo1.jpg'),
('Sauté de légumes', 'plat', '', '5.00', 0, 'photo1.jpg'),
('Sauté de viande', 'plat', '', '5.60', 0, 'IMG_1453.jpg'),
('Sauté de crevettes', 'plat', '', '6.90', 0, 'IMG_1449.jpg'),
('Vermicelles sauté au porc', 'plat2', '', '5.50', 0, 'photo1.jpg'),
('Vermicelles sauté au poulet', 'plat2', '', '5.50', 0, 'photo1.jpg'),
('Riz sauté au poulet à la Thaï', 'plat2', '', '5.50', 0, 'IMG_1430.jpg'),
('Pad Thaï', 'plat2', '', '8.90', 0, 'pad_thai.jpg'),
('Riz nature', 'accompagnement', '', '2.00', 0, 'photo1.jpg'),
('Riz cantonais', 'accompagnement', '', '2.80', 0, 'photo1.jpg'),
('Nouilles sautées', 'accompagnement', '', '2.80', 0, 'photo1.jpg'),
('Gâteau', 'dessert', '', '1.30', 0, 'photo1.jpg'),
('Nouget dur', 'dessert', '', '1.30', 0, 'photo1.jpg'),
('Nouget mou', 'dessert', '', '1.50', 0, 'photo1.jpg'),
('Gingembre confit', 'dessert', '', '2.80', 0, 'photo1.jpg'),
('Fruit frais', 'dessert', '', '3.00', 0, 'photo1.jpg'),
('Coca cola (33cl)', 'boisson', '', '1.00', 0, 'photo1.jpg'),
('Orangina (33cl)', 'boisson', '', '1.00', 0, 'photo1.jpg'),
('Jus d''orange (33cl)', 'boisson', '', '1.00', 0, 'photo1.jpg');
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS reservation (
  id        int NOT NULL AUTO_INCREMENT,
  name      varchar(100) NOT NULL,
  surname   varchar(100) NOT NULL,
  email     varchar(100),
  number    int(10) NOT NULL,
  date      date NOT NULL,
  moment    varchar(10) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Structure de la table reservation
--
CREATE TABLE IF NOT EXISTS reservedmeal (
    idReservation   int NOT NULL,
    idPlat          int NOT NULL,
    quantity        int NOT NULL,
    PRIMARY KEY (idReservation, idPlat)
);

-- --------------------------------------------------------

--
-- Structure de la table user
--
CREATE TABLE IF NOT EXISTS user (
    id          int NOT NULL AUTO_INCREMENT,
    login       varchar(20) NOT NULL,
    password    varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS goldbook (
    id          int NOT NULL AUTO_INCREMENT,
    message     varchar(300) NOT NULL,
    note        int(1) NOT NULL,
    date        timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS reservationsurplace (
  id        int NOT NULL AUTO_INCREMENT,
  name      varchar(100) NOT NULL,
  number    int(10) NOT NULL,
  date      date NOT NULL,
  moment    varchar(10) NOT NULL,
  nb        int(2) NOT NULL,
  PRIMARY KEY (id)
);

alter table reservedmeal add constraint FK_idReservation_id foreign key (idReservation)
references reservation (id) on delete restrict on update restrict;

alter table reservedmeal add constraint FK_idPlat_id foreign key (idPlat)
references plat (id) on delete restrict on update restrict;