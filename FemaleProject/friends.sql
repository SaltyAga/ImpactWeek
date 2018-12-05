-- MySQL Script generated by MySQL Workbench
-- Fri Nov 30 15:55:16 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema friends
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema friends
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `friends` DEFAULT CHARACTER SET utf8 ;
USE `friends` ;

-- -----------------------------------------------------
-- Table `friends`.`cities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`cities` (
  `city_id` INT NOT NULL AUTO_INCREMENT,
  `city_name` VARCHAR(100) NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`city_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `friends`.`industries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`industries` (
  `industry_id` INT NOT NULL AUTO_INCREMENT,
  `industry` VARCHAR(255) NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`industry_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `friends`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL,
  `last_name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `salt` VARCHAR(255) NULL,
  `user_admin` INT NULL DEFAULT 0,
  `phone_number` VARCHAR(45) NULL,
  `birth_date` DATE NULL,
  `linkedin` VARCHAR(255) NULL,
  `biography` TEXT NULL,
  `student_professional` INT NULL,
  `work_place` VARCHAR(255) NULL,
  `expertise` VARCHAR(255) NULL,
  `experience` VARCHAR(255) NULL,
  `support_for` TEXT NULL,
  `support` TEXT NULL,
  `mentor_mentee` INT NULL,
  `recruitment_no_yes` INT NULL,
  `picture_url` VARCHAR(255) NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `city_id` INT NULL,
  `industry_id` INT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_users_cities_idx` (`city_id` ASC),
  INDEX `fk_users_industries1_idx` (`industry_id` ASC),
  CONSTRAINT `fk_users_cities`
    FOREIGN KEY (`city_id`)
    REFERENCES `friends`.`cities` (`city_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_industries1`
    FOREIGN KEY (`industry_id`)
    REFERENCES `friends`.`industries` (`industry_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `friends`.`posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`posts` (
  `post_id` INT NOT NULL AUTO_INCREMENT,
  `post_title` VARCHAR(100) NULL,
  `post` TEXT NULL,
  `public_private` INT NULL DEFAULT 1,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`post_id`),
  INDEX `fk_posts_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_posts_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `friends`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `friends`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`comments` (
  `comment_id` INT NOT NULL AUTO_INCREMENT,
  `comment` TEXT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` INT NOT NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`comment_id`),
  INDEX `fk_comments_posts1_idx` (`post_id` ASC),
  INDEX `fk_comments_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_comments_posts1`
    FOREIGN KEY (`post_id`)
    REFERENCES `friends`.`posts` (`post_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `friends`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `friends`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`events` (
  `event_id` INT NOT NULL AUTO_INCREMENT,
  `event_title` VARCHAR(100) NULL,
  `event_description` TEXT NULL,
  `event_datetime` DATETIME NULL,
  `event_location` VARCHAR(255) NULL,
  `event_price` FLOAT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `uodated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `friends`.`requests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`requests` (
  `requests_id` INT NOT NULL AUTO_INCREMENT,
  `from_user` INT NOT NULL,
  `to_user` INT NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_users_has_users_users2_idx` (`to_user` ASC),
  INDEX `fk_users_has_users_users1_idx` (`from_user` ASC),
  PRIMARY KEY (`requests_id`),
  CONSTRAINT `fk_users_has_users_users1`
    FOREIGN KEY (`from_user`)
    REFERENCES `friends`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users2`
    FOREIGN KEY (`to_user`)
    REFERENCES `friends`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `friends`.`friends`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `friends`.`friends` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `friend_id` INT NOT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_users_has_users_users4_idx` (`friend_id` ASC),
  INDEX `fk_users_has_users_users3_idx` (`user_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_users_has_users_users3`
    FOREIGN KEY (`user_id`)
    REFERENCES `friends`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users4`
    FOREIGN KEY (`friend_id`)
    REFERENCES `friends`.`users` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;