/* RollBack */

DROP DATABASE IF EXISTS void_cine;
CREATE DATABASE void_cine CHARACTER SET utf8 COLLATE utf8_general_ci;

/* Admin */

GRANT USAGE ON *.* TO 'admin'@'localhost';
DROP USER 'admin'@'localhost';
CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin'; GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;

/* Tables */

USE void_cine;

CREATE TABLE Users
(
ID INT(6) PRIMARY KEY NULL AUTO_INCREMENT,
Pseudo VARCHAR(30) NOT NULL,
Mail VARCHAR(75) NOT NULL,
Password VARCHAR(100) NOT NULL,
Charge INT NOT NULL
);

CREATE TABLE Videos
(
ID INT(6) PRIMARY KEY NULL AUTO_INCREMENT,
Nom VARCHAR(100) NOT NULL,
Categorie VARCHAR(75) NOT NULL,
Genre VARCHAR(100) NOT NULL,
Vues INT(6),
Synopsis VARCHAR(1000) NOT NULL,
Realisateur CHAR(30) NOT NULL,
Annee INT(6) NOT NULL,
Duree VARCHAR(100) NOT NULL
);

CREATE TABLE Categories
(
ID INT(6) PRIMARY KEY NULL AUTO_INCREMENT,
Nom VARCHAR(100) NOT NULL
);

CREATE TABLE Genre
(
ID INT(6) PRIMARY KEY NULL AUTO_INCREMENT,
Nom VARCHAR(100) NOT NULL
);

CREATE TABLE Comments
(
ID INT(6) PRIMARY KEY NULL AUTO_INCREMENT,
ID_video INT(6) NOT NULL,
Pseudo VARCHAR(30) NOT NULL,
Avis VARCHAR(500) NOT NULL,
Note INT(5) NOT NULL
);


/* Remplissage */
INSERT INTO Users(Pseudo, Mail, Password, Charge)
VALUES ("Faust", "reuter_f@etna-alternance.net", "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918", 1);

INSERT INTO Comments(ID_video, Pseudo, Avis, Note)
VALUES (1, "Jack", "Toute ma jeunesse...", 5);

INSERT INTO Categories(Nom)
VALUES ("Film");

INSERT INTO Categories(Nom)
VALUES ("Serie");

INSERT INTO Genre(Nom)
VALUES ("Animation");

INSERT INTO Genre(Nom)
VALUES ("Drame");

INSERT INTO Genre(Nom)
VALUES ("Thriller");

INSERT INTO Videos(Nom, Categorie, Genre, Vues, Synopsis, Realisateur, Annee, Duree)
VALUES ('L''Étrange Noël de monsieur Jack', 1, 1, 99, 'Jack Skellington, roi des citrouilles et guide de Halloween-ville, s''ennuie : depuis des siècles, il en a assez de préparer la même fête de Halloween qui revient chaque année, et il rêve de changement. C''est alors qu''il a l''idée de s''emparer de la fête de Noël...', "Henry Selick", 1994, "1h 15min");

INSERT INTO Videos(Nom, Categorie, Genre, Vues, Synopsis, Realisateur, Annee, Duree)
VALUES ("Breaking Bad", 2, 2, 112, 'Walter « Walt » White est professeur de chimie dans un lycée, et vit avec son fils handicapé et sa femme enceinte à Albuquerque, au Nouveau-Mexique. Lorsqu''on lui diagnostique un cancer du poumon en phase terminale avec une espérance de vie estimée à deux ans, tout s''effondre pour lui. Il décide alors de mettre en place un laboratoire et un trafic de méthamphétamine pour assurer un avenir financier confortable à sa famille après sa mort, en s''associant à Jesse Pinkman, un de ses anciens élèves devenu petit trafiquant.', "Vince Gilligan", 2008, "42min");

INSERT INTO Videos(Nom, Categorie, Genre, Vues, Synopsis, Realisateur, Annee, Duree)
VALUES ("Dexter", 2, 2, 19, 'Brillant expert scientifique du service médico-légal de la police de Miami, Dexter Morgan est spécialisé dans l''analyse de prélèvements sanguins. Mais voilà, Dexter cache un terrible secret : il est également tueur en série. Un serial killer pas comme les autres, avec sa propre vision de la justice.', "James Manos Jr", 2006, "52min");

INSERT INTO Videos(Nom, Categorie, Genre, Vues, Synopsis, Realisateur, Annee, Duree)
VALUES ("Shutter Island", 1, 3, 102, 'En 1954, le marshal Teddy Daniels et son coéquipier Chuck Aule sont envoyés enquêter sur l''île de Shutter Island, dans un hôpital psychiatrique où sont internés de dangereux criminels. L''une des patientes, Rachel Solando, a inexplicablement disparu. Comment la meurtrière a-t-elle pu sortir d''une cellule fermée de l''extérieur ? Le seul indice retrouvé dans la pièce est une feuille de papier sur laquelle on peut lire une suite de chiffres et de lettres sans signification apparente. Oeuvre cohérente d''une malade, ou cryptogramme ?', "Martin Scorsese", 2016, "2h 27min");

INSERT INTO Videos(Nom, Categorie, Genre, Vues, Synopsis, Realisateur, Annee, Duree)
VALUES ("Penny Dreadful", 2, 3, 100, 'Dans le Londres de l''époque Victorienne, Vanessa Ives, une jeune femme puissante aux pouvoirs hypnotiques, allie ses forces à celles d''Ethan, un garçon rebelle et violent aux allures de cowboy, et de Sir Malcolm, un vieil homme riche aux ressources inépuisables. Ensemble, ils combattent un ennemi inconnu, presque invisible, qui ne semble pas humain et qui massacre la population...', "John Logan", 2014, "52min");

INSERT INTO Videos(Nom, Categorie, Genre, Vues, Synopsis, Realisateur, Annee, Duree)
VALUES ("Death Note", 2, 1, 12, 'Un carnet maléfique (Death Note) tombe entre les mains de Light Yagami, un adolescent de 17 ans. Ce cahier a un pouvoir maléfique : si quelqu''un note un nom sur ses pages, la personne en question meurt quelques secondes plus tard. Light va utiliser Death Note pour supprimer une bonne fois pour toutes le monde d''êtres méchants, mauvais, malfaisants...', "Tsugumi Ōba", 2006, "26min");

INSERT INTO Videos(Nom, Categorie, Genre, Vues, Synopsis, Realisateur, Annee, Duree)
VALUES ("Million Dollar Baby", 1, 2, 50, 'Rejeté depuis longtemps par sa fille, l''entraîneur Frankie Dunn s''est replié sur lui-même et vit dans un désert affectif, en évitant toute relation qui pourrait accroître sa douleur et sa culpabilité.
Le jour où Maggie Fitzgerald, 31 ans, pousse la porte de son gymnase à la recherche d''un coach, elle n''amène pas seulement avec elle sa jeunesse et sa force, mais aussi une
histoire jalonnée d''épreuves et une exigence, vitale et urgente : monter sur le ring, entraînée par Frankie, et enfin concrétiser le rêve d''une vie.
Après avoir repoussé plusieurs fois sa demande, Frankie se laisse convaincre par l''inflexible détermination de la jeune femme. Une relation mouvementée, tour à tour stimulante et exaspérante, se noue entre eux, au fil de laquelle Maggie et l''entraîneur se découvrent une communauté d''esprit et une complicité inattendues...', "Clint Eastwood", 2005, "2h 12min");


