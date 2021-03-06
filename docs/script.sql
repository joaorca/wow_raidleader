DELETE FROM raid.tryitems;
DELETE FROM wow.items;
DELETE FROM wow.achievements;
DELETE FROM wow.feeds;
UPDATE raid.members SET "character" = NULL;
DELETE FROM wow.characters;
DELETE FROM wow.races;
DELETE FROM wow.classes;


/*
--CREATE SCHEMA wow AUTHORIZATION postgres;
--CREATE SCHEMA raid AUTHORIZATION postgres;

DROP TABLE wow.items;
DROP TABLE wow.achievements;
DROP TABLE wow.feeds;
DROP TABLE wow.characters;
DROP TABLE wow.races;
DROP TABLE wow.classes;

CREATE TABLE wow.races (
  id SERIAL NOT NULL,
  mask VARCHAR(60) NOT NULL,
  side VARCHAR(60) NOT NULL,
  name VARCHAR(60) NOT NULL,
  PRIMARY KEY(id)
) WITHOUT OIDS;

CREATE TABLE wow.classes (
  id SERIAL NOT NULL,
  mask VARCHAR(60) NOT NULL,
  powertype VARCHAR(60) NOT NULL,
  name VARCHAR(60) NOT NULL,
  PRIMARY KEY(id)
) WITHOUT OIDS;

CREATE TABLE wow.characters (
  id SERIAL NOT NULL,
  lastmodified TIMESTAMP WITHOUT TIME ZONE NOT NULL,
  name VARCHAR(80) NOT NULL,
  realm VARCHAR(80) NOT NULL,
  battleground VARCHAR(80) NOT NULL,
  class INTEGER NOT NULL,
  race INTEGER NOT NULL,
  gender INTEGER NOT NULL,
  level INTEGER NOT NULL,
  achievementpoints INTEGER NOT NULL,
  thumbnail VARCHAR(80) NOT NULL,
  guild VARCHAR(80) not null,
  PRIMARY KEY(id),
  CONSTRAINT fk_characters_race FOREIGN KEY (race)
    REFERENCES wow.races(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE,
  CONSTRAINT fk_characters_class FOREIGN KEY (class)
    REFERENCES wow.classes(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE
) WITHOUT OIDS;

CREATE TABLE wow.feeds (
	id SERIAL NOT NULL,
    character integer NOT NULL,
    timestamp timestamp NOT NULL,
    type varchar(60) NOT NULL,
    typevalue integer NOT NULL,
    details varchar(255),
    PRIMARY KEY(id),
     CONSTRAINT fk_feeds_character FOREIGN KEY (character)
    REFERENCES wow.characters(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE
);

CREATE TABLE wow.items(
	id serial not null,
    name varchar(80) NOT NULL,
    quality integer NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE wow.achievements(
	id serial not null,
    title varchar(80) NOT NULL,
    description varchar(255),
    PRIMARY KEY(id)
);

CREATE TABLE raid.core (
	id serial not null,
    description varchar(60),
    PRIMARY KEY(id)
);

CREATE TABLE raid.members (
	id serial not null,
    realm varchar(60) not null,
    name varchar(60) not null,
    character integer,
    PRIMARY KEY(id)	,
     CONSTRAINT fk_members_character FOREIGN KEY ("character")
    REFERENCES wow.characters(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE
);

CREATE TABLE raid.coremembers(
	id serial not null,
    core integer not null,
  	member integer not null ,
    PRIMARY KEY(id)	 ,
    CONSTRAINT fk_coremembers_core FOREIGN KEY (core)
    REFERENCES raid.core(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE,
    CONSTRAINT fk_coremembers_member FOREIGN KEY (member)
    REFERENCES raid.members(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE
);

CREATE TABLE raid.tryitems(
	id serial not null,
	coremember INTEGER not null,
    item integer not null,
    PRIMARY KEY(id)	,
    CONSTRAINT fk_tryitems_item FOREIGN KEY (item)
    REFERENCES wow.feeds(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE,
    CONSTRAINT fk_tryitems_coremember FOREIGN KEY (coremember)
    REFERENCES raid.coremembers(id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE
    NOT DEFERRABLE
);

insert into raid.core (description) values ('#raidleadervaisefuder');

insert into raid.members (realm,name) values ('Goldrinn','Kinceler');
insert into raid.members (realm,name) values ('Goldrinn','Valexca');
insert into raid.members (realm,name) values ('Goldrinn','Huntera');
insert into raid.members (realm,name) values ('Goldrinn','Jeflock');
insert into raid.members (realm,name) values ('Goldrinn','Birubirujack');
insert into raid.members (realm,name) values ('Goldrinn','Haoko');
insert into raid.members (realm,name) values ('Goldrinn','Mebymyself');
insert into raid.members (realm,name) values ('Goldrinn','Oberion');
insert into raid.members (realm,name) values ('Goldrinn','Prymor');
insert into raid.members (realm,name) values ('Goldrinn','Raines');

insert into raid.coremembers (core, member)
select 1, id from raid.members;
*/