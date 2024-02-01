-- MySQL Script generated
-- mar 30 ene 2024 12:29:35
-- Model: nom_applicantsdb    Version: 1.0

-- applicants system for vacancies

-- -----------------------------------------------------
-- Schema nom_applicantsdb
-- -----------------------------------------------------
-- applicants simple db schema // sqlite must remove the COMMENT part/keyword to work

-- -----------------------------------------------------
-- Table `nom_user_registers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nom_user_registers` ;

CREATE TABLE IF NOT EXISTS `nom_user_registers` (
  `cod_user` VARCHAR(80) NOT NULL COMMENT 'named ic or passport code or licence number depends of country',
  `email` VARCHAR(80) NULL DEFAULT NULL COMMENT 'identification login of the user as alternate',
  `userpass` VARCHAR(80) NULL DEFAULT NULL COMMENT 'passowrd encripted by the framework',
  `api_token` VARCHAR(80) NULL DEFAULT NULL COMMENT 'api key for non password usage',
  `userlevel` VARCHAR(80) NULL DEFAULT NULL COMMENT 'from 0 as invited applicant or 1 as registered user or 5 as manager of vacancies',
  `created_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date creation of',
  `updated_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date change of',
  PRIMARY KEY (`cod_user`))
COMMENT = 'represent the internal users to access the vacancies manager';


-- -----------------------------------------------------
-- Table `nom_user_profile`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nom_user_profile` ;

CREATE TABLE IF NOT EXISTS `nom_user_profile` (
  `cod_user` VARCHAR(80) NOT NULL COMMENT 'named ic or passport code or licence number depends of country',
  `first_name` VARCHAR(80) NULL DEFAULT NULL COMMENT 'name',
  `second_name` VARCHAR(80) NULL DEFAULT NULL COMMENT 'surname',
  `last_name` VARCHAR(80) NULL DEFAULT NULL COMMENT 'named apellido in latam',
  `second_surname` VARCHAR(80) NULL DEFAULT NULL COMMENT 'second surname or appellido in latam',
  `presentation` TEXT NULL DEFAULT NULL COMMENT 'a short description of',
  `education_level` VARCHAR(80) NULL DEFAULT NULL COMMENT 'level graduated education - 1 primary - 4 univers - 5 doctor - 6 mgrs',
  `address_born` VARCHAR(80) NULL DEFAULT NULL COMMENT 'place where its born',
  `address_living` VARCHAR(80) NULL DEFAULT NULL COMMENT 'place where its currently living or sleeping',
  `first_phone` VARCHAR(80) NULL DEFAULT NULL COMMENT 'main mobile phone or local one',
  `second_phone` VARCHAR(80) NULL DEFAULT NULL COMMENT 'another phone number for contact',
  `picture_face` VARCHAR(80) NULL DEFAULT NULL COMMENT 'path photo of the presentation of their face',
  `picture_body` VARCHAR(80) NULL DEFAULT NULL COMMENT 'path photo of the full presentation of their person',
  `created_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date creation of',
  `updated_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date change of',
  PRIMARY KEY (`cod_user`))
COMMENT = 'table for the people tregistered with thier caracteristics';


-- -----------------------------------------------------
-- Table `nom_vacancies_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nom_vacancies_details` ;

CREATE TABLE IF NOT EXISTS `nom_vacancies_details` (
  `cod_vacancies` VARCHAR(80) NOT NULL COMMENT 'id of the vacancy',
  `is_permanent` VARCHAR(80) NOT NULL DEFAULT 'P' COMMENT 'if the job is P-ermanent or T-emporally',
  `vacancies_name` TEXT NULL DEFAULT NULL COMMENT 'long title of the vacancy work, short title is at the main table',
  `vacancies_description` TEXT NULL DEFAULT NULL COMMENT 'short description of the vacancy work to offer',
  `vacancies_direction` TEXT NULL DEFAULT NULL COMMENT 'address of the position, mostly close to and not detailed',
  `vacancies_start` VARCHAR(80) NULL DEFAULT NULL COMMENT 'YYYYMMDD date of valid publication for public people',
  `vacancies_end` VARCHAR(80) NULL DEFAULT NULL COMMENT 'YYYYMMDD date of expiration of this vacancy',
  `created_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date creation of',
  `updated_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date change of',
  PRIMARY KEY (`cod_vacancies`))
COMMENT = 'the oportunities of works for future employeers';


-- -----------------------------------------------------
-- Table `nom_vacancies_tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nom_vacancies_tag` ;

CREATE TABLE IF NOT EXISTS `nom_vacancies_tag` (
  `cod_vacancies_tag` VARCHAR(80) NOT NULL COMMENT 'id of the tag for various vacancies',
  `des_vacancies_tag` TEXT NULL DEFAULT NULL COMMENT 'name category or tag .. mostly only two words allowed',
  `created_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date creation of',
  `updated_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date change of',
  PRIMARY KEY (`cod_vacancies_tag`))
COMMENT = 'used to filtering the vacancies';


-- -----------------------------------------------------
-- Table `nom_vacancies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nom_vacancies` ;

CREATE TABLE IF NOT EXISTS `nom_vacancies` (
  `cod_vacancies` VARCHAR(80) NOT NULL,
  `cod_vacancies_tag` VARCHAR(80) NOT NULL,
  `vacancies_title` TEXT NULL COMMENT 'short name of the vacancie, mostly combianiton of most usefull words of title and description',
  `created_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date creation of',
  `updated_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date change of',
  PRIMARY KEY (`cod_vacancies`, `cod_vacancies_tag`))
COMMENT = 'main table of vacancies';


-- -----------------------------------------------------
-- Table `nom_vacancies_applicants`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `nom_vacancies_applicants` ;

CREATE TABLE IF NOT EXISTS `nom_vacancies_applicants` (
  `cod_vacancies` VARCHAR(80) NOT NULL COMMENT 'vacancy that user try to apply, this is the history of both users and vacancies',
  `cod_user` VARCHAR(80) NOT NULL COMMENT 'user that try to apply for',
  `apply_at` VARCHAR(80) NULL COMMENT 'YYYYMMDDHHmmss user apply for',
  `created_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date creation of',
  `updated_at` VARCHAR(80) NOT NULL COMMENT 'YYYYMMDDHHmmss date change of',
  PRIMARY KEY (`cod_vacancies`, `cod_user`))
COMMENT = 'amount of users that applies to vacancies';


-- -----------------------------------------------------
-- Data for table `nom_user_registers`
-- -----------------------------------------------------
INSERT INTO `nom_user_registers` (`cod_user`, `email`, `userpass`, `api_token`, `userlevel`, `created_at`, `updated_at`) VALUES ('123', 'demo', 'demo', 'token', '1', '20230101', '20230101');


-- -----------------------------------------------------
-- Data for table `nom_user_profile`
-- -----------------------------------------------------
INSERT INTO `nom_user_profile` (`cod_user`, `first_name`, `second_name`, `last_name`, `second_surname`, `presentation`, `education_level`, `address_born`, `address_living`, `first_phone`, `second_phone`, `picture_face`, `picture_body`, `created_at`, `updated_at`) VALUES ('123', 'name', 'surape', 'apellid', 'overname', 'i am a employer', '2', 'venezuela, city, address, home number', 'colombia, city, address, home floor', '+582122661610', '+502125556677', 'storage/files/face.jpeg', NULL, '20240101', '20240101');


-- -----------------------------------------------------
-- Data for table `nom_vacancies_details`
-- -----------------------------------------------------
INSERT INTO `nom_vacancies_details` (`cod_vacancies`, `is_permanent`, `vacancies_name`, `vacancies_description`, `vacancies_direction`, `vacancies_start`, `vacancies_end`, `created_at`, `updated_at`) VALUES ('1', '0', 'Gerente', 'Manager for loren ipsum loren ipsum', 'Calle paez cruze con bolivar', '20240131', '20240220', '20240130', '20240130');


-- -----------------------------------------------------
-- Data for table `nom_vacancies_tag`
-- -----------------------------------------------------
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Legal', 'Abogado, Politica, Policia, Juez, Jurado', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Artes', 'Diseño grafico, Marqueting', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Salud', 'Agronomía, Fisioterapia, Antropología, Enfermería, Odontología', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Admin', 'Archivología, Gerente, Sub Gerente, Administradora', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Ingenieria', 'Civil, Arquitectura, Soporte Tecnico, Electrica, Mecanica', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Ciencias', 'Contaduría, Computación, Estadística, Reportes, Geografía, Química', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Comunica', 'Abogado, Politica, Gerencia, Auditoria, Filosofía, Idiomas, Psicología, Comunicacion', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Economia', 'Negocios, Compras, Tesoreria, Finanzas, Economia', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Educacion', 'Educacion, Cursos, Historia', '20240101', '20240101');
INSERT INTO `nom_vacancies_tag` (`cod_vacancies_tag`, `des_vacancies_tag`, `created_at`, `updated_at`) VALUES ('Procesos', 'Procesos Industriales, Gerencia de procesos', '20240101', '20240101');


-- -----------------------------------------------------
-- Data for table `nom_vacancies`
-- -----------------------------------------------------
INSERT INTO `nom_vacancies` (`cod_vacancies`, `cod_vacancies_tag`, `vacancies_title`, `created_at`, `updated_at`) VALUES ('1', 'Admin', 'Gerente for manager', '20240131', '20240131');

