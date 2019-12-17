-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema prova
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema prova
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `prova` DEFAULT CHARACTER SET utf8 ;
USE `prova` ;

-- -----------------------------------------------------
-- Table `prova`.`Movies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `prova`.`Movies` (
  `idMovies` INT(11) NOT NULL,
  `release_year` INT(4) NOT NULL,
  `title` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idMovies`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

ALTER TABLE `prova`.`movies` 
CHANGE COLUMN `idMovies` `idMovies` INT(11) NOT NULL AUTO_INCREMENT ;