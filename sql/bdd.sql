DROP DATABASE IF EXISTS `bdd`;
CREATE DATABASE `bdd`;
USE `bdd`;

CREATE TABLE `Client` (
  `cli_num` int,
  `cli_nom` varchar(50) NOT NULL,
  `cli_adresse` varchar(50) NOT NULL,
  `cli_tel` varchar(30) NOT NULL,
CONSTRAINT Client_PK PRIMARY KEY (cli_num)
);

CREATE TABLE `Commande` (
  `com_num` int,
  `cli_num` int NOT NULL,
  `com_date` datetime NOT NULL,
  `com_obs` varchar(50),
CONSTRAINT Commande_PK PRIMARY KEY (com_num),
CONSTRAINT Commande_Client_FK FOREIGN KEY (cli_num) REFERENCES Client(cli_num)
);

CREATE TABLE `Produit` (
  `pro_num` int,
  `pro_libelle` varchar(50) NOT NULL,
  `pro_description` varchar(50) NOT NULL,
CONSTRAINT Produit_PK PRIMARY KEY (pro_num)
);

CREATE TABLE `est_compose` (
  `com_num` int,
  `pro_num` int,
  `est_qte` int NOT NULL,
CONSTRAINT est_compose_PK PRIMARY KEY (com_num,pro_num),
CONSTRAINT est_compose_Produit_FK FOREIGN KEY (com_num) REFERENCES Produit(pro_num),
CONSTRAINT est_compose_Commande_FK FOREIGN KEY (pro_num) REFERENCES Commande(com_num)
);

CREATE INDEX `index` ON `Client` (`cli_nom`);