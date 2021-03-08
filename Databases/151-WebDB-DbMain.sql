-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Mon Mar  8 10:06:22 2021 
-- * LUN file: H:\04-modules-ict\151-WebDynamiqueDB\151-WebDB.lun 
-- * Schema: mld/SQL 
-- ********************************************* 


-- Database Section
-- ________________ 

create database if not exists db_nickname_kilgood;



-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table t_user (
     idUser -- Sequence attribute not implemented -- not null,
     useLogin varchar(50) not null,
     useMdp varchar(62) not null,
     useIsAdmin char not null,
     constraint ID_t_user_ID primary key (idUser));

create table t_teacher (
     idTeacher -- Sequence attribute not implemented -- not null,
     teaName varchar(50) not null,
     teaFirstname varchar(50) not null,
     teaGender char(1) not null,
     teaOrigin varchar(255) not null,
     teaNickname varchar(100) not null,
     constraint ID_t_teacher_ID primary key (idTeacher));

create table t_section (
     idSection -- Sequence attribute not implemented -- not null,
     secName varchar(50) not null,
     constraint ID_t_section_ID primary key (idSection));

create table t_teache (
     idSection numeric(1) not null,
     idTeacher numeric(1) not null,
     constraint ID_t_teache_ID primary key (idTeacher, idSection));


-- Constraints Section
-- ___________________ 

alter table t_teache add constraint REF_t_tea_t_tea
     foreign key (idTeacher)
     references t_teacher;

alter table t_teache add constraint REF_t_tea_t_sec_FK
     foreign key (idSection)
     references t_section;


-- Index Section
-- _____________ 

create unique index ID_t_user_IND
     on t_user (idUser);

create unique index ID_t_teacher_IND
     on t_teacher (idTeacher);

create unique index ID_t_section_IND
     on t_section (idSection);

create unique index ID_t_teache_IND
     on t_teache (idTeacher, idSection);

create index REF_t_tea_t_sec_IND
     on t_teache (idSection);

