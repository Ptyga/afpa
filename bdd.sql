CREATE DATABASE papyrus

CREATE TABLE PRODUIT (
    CODART char(4) NOT NULL PRIMARY KEY, 
    LIBART varchar(30) NOT NULL,
    STKALE tinyint NOT NULL,
    STKPHY tinyint NOT NULL,
    QTEANN int NOT NULL,
    UNIMES char(5) NOT NULL
)

CREATE TABLE ENTCOM (
    NUMCOM int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    OBSCOM varchar(50),
    DATCOM datetime NOT NULL,
    NUMFOU tinyint FOREIGN KEY (NUMFOU) REFERENCES FOURNIS(NUMFOU)
)

CREATE TABLE LIGCOM (
    NUMCOM int NOT NULL, FOREIGN KEY (NUMCOM) REFERENCES ENTCOM(NUMCOM),
    NUMLIG tinyint NOT NULL PRIMARY KEY,
    CODART char(4) NOT NULL, FOREIGN KEY (CODART) REFERENCES PRODUIT(CODART),
    QTECDE int NOT NULL,
    PRIUNI decimal(9, 2) NOT NULL,
    QTELIV int,
    DERLIV datetime NOT NULL
)

CREATE TABLE FOURNIS (
    NUMFOU tinyint NOT NULL PRIMARY KEY,
    NOMFOU varchar(25) NOT NULL,
    RUEFOU varchar(50) NOT NULL,
    POSFOU char(5) NOT NULL, 
    CHECK (POSFOU=18),
    VILFOU varchar(30) NOT NULL,
    CONFOU varchar(15) NOT NULL,
    SATISF tinyint CHECK (SATISF BETWEEN 1 and 10 )

)

CREATE TABLE VENTE (
    CODART char(4) NOT NULL FOREIGN KEY (CODART) REFERENCES PRODUIT(CODART),
    NUMFOU tinyint NOT NULL FOREIGN KEY (NUMFOU) REFERENCES FOURNIS(NUMFOU),
    DELLIV smallint NOT NULL,
    QTE1 int NOT NULL,
    PRIX1 decimal(9, 2) NOT NULL,
    QTE2 int,
    PRIX2 decimal(9, 2),
    QTE3 int,
    PRIX3 decimal(9, 2)
)



	
INSERT INTO PRODUIT (CODART, LIBART, STKALE, STKPHY, QTEANN, UNIMES)
VALUES ('I100','Papier 1 ex continu', 100, 557, 3500, 'B1000'),
('I105','Papier 2 ex continu', 75, 5, 2300, 'B1000'),
('I108','Papier 3 ex continu', 200, 557, 3500, 'B500'),
('I110','Papier 4 ex continu', 10, 12, 63, 'B400'),
('P220','Pré imprimé commande', 500, 2500, 24500, 'B500'),
('P230','Pré imprimé facture', 500, 250, 12500, 'B500'),
('P240','Pré imprimé bulletin paie', 500, 3000, 6250, 'B500'),
('P250','Pré imprimé bon livraison', 500, 2500, 24500, 'B500'),
('P270','Pré imprimé bon fabrication', 500, 2500, 24500, 'B500'),
('R080','Ruban Epson 850', 10, 2, 120, 'unité'),
('R132','Ruban imp1200 lignes', 25, 200, 182, 'unité'),
('B002','Bande magnétique 6250', 20, 12, 410, 'unité'),
('B001','Bande magnétique 1200 ', 20, 87, 240, 'unité'),
('D035','CD R slim 80 mm', 40, 42, 150, 'B010'),
('D050','CD R-W 80mm', 50, 4, 0, 'B010')