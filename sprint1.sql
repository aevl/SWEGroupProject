SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS mydb ;
USE mydb ;

CREATE TABLE IF NOT EXISTS mydb.User (
  first_name VARCHAR(255) NULL,
  last_name VARCHAR(45) NULL,
  email VARCHAR(45) NOT NULL,
  password VARCHAR(45) NULL,
  bio VARCHAR(45) NULL,
  picture VARCHAR(45) NULL,
  location VARCHAR(45) NULL,
  industry VARCHAR(45) NULL,
  PRIMARY KEY (email))ENGINE = INNODB;




CREATE TABLE IF NOT EXISTS mydb.Business (
  company_name VARCHAR(45) NOT NULL,
  industry VARCHAR(45) NULL,
  email VARCHAR(45) NULL,
  password VARCHAR(45) NULL,
  contact_email VARCHAR(45) NULL,
  website VARCHAR(45) NULL,
  description VARCHAR(45) NULL,
  PRIMARY KEY (company_name))ENGINE = INNODB;


CREATE TABLE IF NOT EXISTS mydb.Business_has_User (
  Business_company_name VARCHAR(45) NOT NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (Business_company_name, User_email),
  INDEX fk_Business_has_User_User1_idx (User_email ASC),
  INDEX fk_Business_has_User_Business_idx (Business_company_name ASC),
  CONSTRAINT fk_Business_has_User_Business
    FOREIGN KEY (Business_company_name)
    REFERENCES mydb.Business (company_name)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Business_has_User_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)ENGINE = INNODB;






CREATE TABLE IF NOT EXISTS mydb.Message (
  id INT NOT NULL,
  sender VARCHAR(45) NULL,
  receiver VARCHAR(45) NULL,
  text VARCHAR(45) NULL,
  PRIMARY KEY (id))ENGINE = INNODB;




CREATE TABLE IF NOT EXISTS mydb.Message_has_User (
  Message_id INT NOT NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (Message_id, User_email),
  INDEX fk_Message_has_User_User1_idx (User_email ASC),
  INDEX fk_Message_has_User_Message1_idx (Message_id ASC),
  CONSTRAINT fk_Message_has_User_Message1
    FOREIGN KEY (Message_id)
    REFERENCES mydb.Message (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_Message_has_User_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
)ENGINE = INNODB;





CREATE TABLE IF NOT EXISTS mydb.Experience (
  id VARCHAR(45) NOT NULL,
  data_start DATETIME NULL,
  data_end DATETIME NULL,
  title VARCHAR(45) NULL,
  company VARCHAR(45) NULL,
  description VARCHAR(45) NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_Experience_User1_idx (User_email ASC),
  CONSTRAINT fk_Experience_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
)ENGINE = INNODB;




CREATE TABLE IF NOT EXISTS mydb.Publication (
  title VARCHAR(45) NOT NULL,
  date DATETIME NULL,
  description VARCHAR(45) NULL,
  authors VARCHAR(45) NOT NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (title, authors),
  INDEX fk_Publication_User1_idx (User_email ASC),
  CONSTRAINT fk_Publication_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
)ENGINE = INNODB;




CREATE TABLE IF NOT EXISTS mydb.Education (
  type VARCHAR(45) NOT NULL,
  title VARCHAR(45) NULL,
  location VARCHAR(45) NULL,
  school VARCHAR(45) NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (type),
  INDEX fk_Education_User1_idx (User_email ASC),
  CONSTRAINT fk_Education_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
)ENGINE = INNODB;




CREATE TABLE IF NOT EXISTS mydb.skill (
  name VARCHAR(45) NOT NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (name),
  INDEX fk_skill_User1_idx (User_email ASC),
  CONSTRAINT fk_skill_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
)ENGINE = INNODB;




CREATE TABLE IF NOT EXISTS mydb.Language (
  name VARCHAR(45) NOT NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (name),
  INDEX fk_Language_User1_idx (User_email ASC),
  CONSTRAINT fk_Language_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
)ENGINE = INNODB;




CREATE TABLE IF NOT EXISTS mydb.Organization (
  id VARCHAR(45) NOT NULL,
  name VARCHAR(45) NULL,
  title VARCHAR(45) NULL,
  date_start DATETIME NULL,
  data_end DATETIME NULL,
  User_email VARCHAR(45) NOT NULL,
  PRIMARY KEY (id),
  INDEX fk_Organization_User1_idx (User_email ASC),
  CONSTRAINT fk_Organization_User1
    FOREIGN KEY (User_email)
    REFERENCES mydb.User (email)
)ENGINE = INNODB;
