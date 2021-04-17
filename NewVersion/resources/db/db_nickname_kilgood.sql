

DROP DATABASE IF EXISTS db_nickname_kilgood;

CREATE DATABASE db_nickname_kilgood;

DROP USER IF EXISTS 'dbNicknameUser'@'%';

CREATE USER 'dbNicknameUser'@'%' IDENTIFIED BY 'grp2B_21';

GRANT SELECT, INSERT, UPDATE, DELETE ON db_nickname_kilgood.* TO 'dbNicknameUser'@'%';

USE db_nickname_kilgood;

CREATE TABLE t_teacher(
	idTeacher int AUTO_INCREMENT PRIMARY KEY,
	teaFirstname varchar(50) NOT NULL,
	teaName varchar(50) NOT NULL,
	teaGender char(1) NOT NULL,
	teaNickname varchar(100) NOT NULL,
	teaOrigin varchar(255) NOT NULL);

CREATE TABLE t_section(
	idSection int AUTO_INCREMENT PRIMARY KEY,
	secName varchar(30) NOT NULL);

CREATE TABLE t_teaches(
	fkteacher int NOT NULL,
	fksection int NOT NULL,
	CONSTRAINT fk_teacher_teaches_id FOREIGN KEY (fkteacher) REFERENCES t_teacher(idTeacher) ON DELETE CASCADE,
	CONSTRAINT fk_section_teaches_id FOREIGN KEY (fksection) REFERENCES t_section(idSection) ON DELETE CASCADE,
	PRIMARY KEY (fksection,fkteacher));

CREATE TABLE t_user(
	idUser int AUTO_INCREMENT PRIMARY KEY,
	useLogin varchar(50) NOT NULL,
	usePassword varchar(62) NOT NULL,
	useIsAdmin smallint(1) NOT NULL);

INSERT INTO t_user (useLogin, usePassword, useIsAdmin) VALUES 
("admin", "admin", 1
);

INSERT INTO t_section (secName) VALUES 
("Informatique"),
("Théorie");

INSERT INTO t_teacher (teaFirstname, teaName, teaGender, teaNickname, teaOrigin) VALUES 
("Antoine","Mveng","M","Mercedes","Car login -> AMG"),
("Karim", "Bourahla", "M", "ceFaire", "Car il aime nous faire"),
("Michel","Delgado","M","NumberOne","Meilleur prof de réseau"),
("Patrick", "Chenaux", "M", "Café", "Pause café"),
("Patrick", "Olivier", "M", "Pile", "Prof d'ELEOC"),
("Aurélie", "Curchod", "W", "Kevin", "Car elle ma appelée Kevin"),
("Laurent", "Duding", "M", "Covid", "Rattrapage covid"),
("Jonathan", "Gander", "M", "Junior", "Prof jeune sympathique est dynamqique"),
("Gilbert", "Gruaz", "M", "Gruazerie", "Car il fait toujours des gruazerie"),
("Dimitri", "Lymberis", "M", "8 litre", "Car il a une mercedes 8 litres"),
("Betrand", "Sahli", "M", "Médiateur", "Car c'est un médiateur"),
("Cyril", "Sokoloff", "M", "Badminton", "Car il joue au badminton"),
("Isabelle", "Stucki", "W", "Petit gâteau", "Car elle nous fait de petit gâteau");
);

INSERT INTO t_teaches (fkteacher, fksection) VALUES 
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1
);