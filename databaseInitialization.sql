SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `mydb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `user` (
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NULL,
  `bio` VARCHAR(45) NULL,
  `picture` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `industry` VARCHAR(45) NULL,
  `id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `business`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `business` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `business` (
  `id` INT NOT NULL,
  `company_name` VARCHAR(45) NULL,
  `industry` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `contact_email` VARCHAR(45) NULL,
  `website` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  PRIMARY KEY (`company_name`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `message` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `message` (
  `id` INT NOT NULL,
  `send_time_stamp` DATETIME NULL,
  `sender_id` VARCHAR(45) NULL,
  `receiver_id` VARCHAR(45) NULL,
  `contents` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `experience`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `experience` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` INT NOT NULL,
  `date_start` DATETIME NULL,
  `date_end` DATETIME NULL,
  `title` VARCHAR(45) NULL,
  `company` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_experience_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `publication`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `publication` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `publication` (
  `title` VARCHAR(45) NOT NULL,
  `date` DATETIME NULL,
  `description` VARCHAR(45) NULL,
  `authors` VARCHAR(45) NOT NULL,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`title`, `authors`, `user_email`),
  CONSTRAINT `fk_publication_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `education`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `education` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `education` (
  `type` VARCHAR(45) NOT NULL,
  `title` VARCHAR(45) NULL,
  `location` VARCHAR(45) NULL,
  `school` VARCHAR(45) NULL,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`type`),
  CONSTRAINT `fk_education_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `skill`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `skill` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `skill` (
  `name` VARCHAR(45) NOT NULL,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`name`),
  CONSTRAINT `fk_skill_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `language`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `language` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `language` (
  `name` VARCHAR(45) NOT NULL,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`name`),
  CONSTRAINT `fk_language_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `organization`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `organization` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `organization` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `title` VARCHAR(45) NULL,
  `date_start` DATETIME NULL,
  `date_end` DATETIME NULL,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_organization_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `business_has_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `business_has_user` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `business_has_user` (
  `business_id` INT NOT NULL,
  `user_email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`business_id`, `user_email`),
  CONSTRAINT `fk_business_has_user_Business1`
    FOREIGN KEY (`business_id`)
    REFERENCES `business` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_business_has_user_user1`
    FOREIGN KEY (`user_email`)
    REFERENCES `user` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `user_has_message`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user_has_message` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `user_has_message` (
  `user_id` VARCHAR(25) NOT NULL,
  `message_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `message_id`),
  CONSTRAINT `fk_user_has_message_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_message_Message1`
    FOREIGN KEY (`message_id`)
    REFERENCES `message` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

