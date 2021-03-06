﻿/* création MCD Majhong */


/*
DROP TABLE SELECTIONNER;
DROP TABLE CASES;
DROP TABLE CARTE;
DROP TABLE CONNEXION;
DROP TABLE PARTIE;
DROP TABLE COORDONNEES;
DROP TABLE NIVEAU;
DROP TABLE JOUEUR;
DROP TABLE COLLECTION;
*/

CREATE TABLE COLLECTION(
id_collection INT CONSTRAINT pk_collection PRIMARY KEY NOT NULL,
nom_collection VARCHAR(20) NOT NULL
);
CREATE TABLE JOUEUR(
id_joueur INT CONSTRAINT pk_joueur PRIMARY KEY NOT NULL,
nom VARCHAR(50) NOT NULL,
prenom VARCHAR(20) NOT NULL,
nom_utilisateur VARCHAR(20) NOT NULL,
pseudo VARCHAR(500) NOT NULL,
mail VARCHAR(40) NOT NULL,
mot_de_passe VARCHAR(1000) NOT NULL,
administrateur NUMBER(1) NOT NULL
);
CREATE TABLE CONNEXION(
id_connexion INT CONSTRAINT pk_connexion PRIMARY KEY NOT NULL,
date_connexion TIMESTAMP NOT NULL,
id_joueur INT CONSTRAINT fk_joueur_connexion references JOUEUR(id_joueur) NOT NULL
);

CREATE TABLE NIVEAU(
id_niveau INT CONSTRAINT pk_niveau PRIMARY KEY NOT NULL,
nom_niveau VARCHAR(20) NOT NULL,
id_collection INT CONSTRAINT fk_collection_niveau REFERENCES COLLECTION(id_collection) NOT NULL
);


CREATE TABLE PARTIE(
id_partie INT CONSTRAINT pk_game PRIMARY KEY NOT NULL,
dateDeb_partie TIMESTAMP NOT NULL,
dateFIN_game TIMESTAMP NOT NULL,
resultat NUMBER(1) NOT NULL,
score INT,
id_joueur INT CONSTRAINT fk_joueur_partie references JOUEUR(id_joueur) NOT NULL,
id_niveau INT CONSTRAINT fk_niveau_partie REFERENCES NIVEAU(id_niveau) NOT NULL,
CONSTRAINT resultat_partie CHECK (resultat IN (0, 1))
);


CREATE TABLE COORDONNEES(
id_coordonnees INT CONSTRAINT pk_coordonnees PRIMARY KEY NOT NULL,
x INT NOT NULL,
y INT NOT NULL,
z INT NOT NULL,
vide NUMBER(1) NOT NULL,
id_niveau INT CONSTRAINT fk_niveau_coord REFERENCES NIVEAU(id_niveau) NOT NULL,
CONSTRAINT vide_coord CHECK (vide IN (0, 1))
);


CREATE TABLE CARTE(
id_carte INT CONSTRAINT pk_carte PRIMARY KEY NOT NULL,
chemin_carte VARCHAR(50) NOT NULL,
id_collection INT CONSTRAINT fk_collection_carte REFERENCES COLLECTION(id_collection) NOT NULL
);


CREATE TABLE CASES(
id_cases INT CONSTRAINT pk_cases PRIMARY KEY NOT NULL,
statut NUMBER(1) NOT NULL,
vide NUMBER(1) NOT NULL,
id_coordonnees INT CONSTRAINT fk_coordonnees_case REFERENCES COORDONNEES(id_coordonnees) NOT NULL,
id_carte INT CONSTRAINT fk_carte_case REFERENCES CARTE(id_carte) NOT NULL,
id_partie INT CONSTRAINT fk_partie_case REFERENCES PARTIE(id_partie) NOT NULL,
CONSTRAINT statut_cases CHECK (statut IN (0, 1)),
CONSTRAINT vide_cases CHECK (vide IN (0, 1))
);


CREATE TABLE SELECTIONNER(
id_selectionner INT CONSTRAINT pk_selectionner PRIMARY KEY NOT NULL,
date_selection TIMESTAMP NOT NULL,
type_selection NUMBER(1) NOT NULL,
id_carte INT CONSTRAINT fk_carte_select REFERENCES CARTE(id_carte) NOT NULL,
id_partie INT CONSTRAINT fk_partie_select REFERENCES PARTIE(id_partie) NOT NULL
);

GRANT SELECT, INSERT, UPDATE
ON CARTE
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON CASES
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON COLLECTION
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON CONNEXION
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON COORDONNEES
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON JOUEUR
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON NIVEAU
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON PARTIE
TO BRL2198A;
GRANT SELECT, INSERT, UPDATE
ON SELECTIONNER
TO BRL2198A;
