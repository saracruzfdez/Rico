-- MySQL Script generated by MySQL Workbench
-- Tue Nov 15 16:21:22 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Rico
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Rico
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Rico` DEFAULT CHARACTER SET utf8 ;
USE `Rico` ;

-- -----------------------------------------------------
-- Table `Rico`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rico`.`user` (
  `username` VARCHAR(16) NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `Rico`.`recette`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Rico`.`recette` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `time` INT NULL,
  `image` VARCHAR(45) NULL,
  `title` VARCHAR(45) NULL,
  `persons` INT NULL,
  `ingredients` VARCHAR(45) NULL,
  `recipe` VARCHAR(250) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  INDEX `fk_recette_user_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_recette_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `Rico`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
