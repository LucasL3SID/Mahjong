-- création MCD Majhong


/*
DROP TABLE CARDS;
DROP TABLE PLAYER;
DROP TABLE LOGIN;
DROP TABLE LEVELS;
DROP TABLE GAME;
DROP TABLE COORDINATE;
DROP TABLE MOVE;
*/


CREATE TABLE CARDS(
id_cards INT CONSTRAINT pk_cards PRIMARY KEY,
symbol_path VARCHAR(50),
collection VARCHAR(30)
);

CREATE TABLE PLAYER(
id_player INT CONSTRAINT pk_player PRIMARY KEY,
name VARCHAR(20),
firstname VARCHAR(20),
username VARCHAR(20),
pseudo VARCHAR(50),
password VARCHAR(50),
administator BOOLEAN,
levels INT
);

CREATE TABLE LOGIN(
id_log INT CONSTRAINT pk_login PRIMARY KEY,
log_date DATETIME
id_player INT CONSTRAINT fk_player references PLAYER(id_player)
);

CREATE TABLE LEVELS(
id_levels INT CONSTRAINT pk_levels PRIMARY KEY,
difficulty VARCHAR(10),
hightscore_minute INT,
hightscore_hour INT,
hightscore_global INT
);

CREATE TABLE GAME(
id_game INT CONSTRAINT pk_game PRIMARY KEY,
results BOOLEAN,
date_game DATETIME,
id_player INT CONSTRAINT fk_player REFERENCES PLAYER(id_player),
id_levels INT CONSTRAINT fk_levels REFERENCES LEVELS(id_levels)
);


CREATE TABLE COORDINATE(
id_coordinate INT CONSTRAINT pk_coordinate PRIMARY KEY,
x INT,
y INT,
z INT,
empty BOOLEAN,
free BOOLEAN,
id_levels INT CONSTRAINT fk_levels REFERENCES LEVELS(id_levels),
id_cards INT CONSTRAINT fk_cards REFERENCES CARDS(id_cards)
);

CREATE TABLE MOVE(
id_move INT CONSTRAINT pk_move PRIMARY KEY,
action BOOLEAN,
move_number INT,
id_player INT CONSTRAINT fk_player REFERENCES PLAYER(id_player),
id_game INT CONSTRAINT fk_game REFERENCES GAME(id_game),
id_coordinate INT CONSTRAINT fk_coordinate REFERENCES COORDINATE(id_coordinate)
);



