SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `FactoryPage` ;
CREATE SCHEMA IF NOT EXISTS `FactoryPage` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `FactoryPage` ;

-- -----------------------------------------------------
-- Table `FactoryPage`.`tblControladores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblControladores` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblControladores` (
  `conId` INT(11) NOT NULL AUTO_INCREMENT ,
  `conNombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  PRIMARY KEY (`conId`) )
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblAcciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblAcciones` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblAcciones` (
  `accId` INT(11) NOT NULL AUTO_INCREMENT ,
  `accNombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  `accControladorId` INT(11) NULL DEFAULT NULL COMMENT '\n' ,
  PRIMARY KEY (`accId`) ,
  INDEX `accion_controlador_idx` (`accControladorId` ASC) ,
  CONSTRAINT `fkAccionControlador`
    FOREIGN KEY (`accControladorId` )
    REFERENCES `FactoryPage`.`tblControladores` (`conId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblRoles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblRoles` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblRoles` (
  `rolId` INT(11) NOT NULL AUTO_INCREMENT ,
  `rolNombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `rolEstado` TINYINT(4) NULL DEFAULT '1' ,
  PRIMARY KEY (`rolId`) )
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblPermisos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblPermisos` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblPermisos` (
  `perId` INT(11) NOT NULL AUTO_INCREMENT ,
  `perRolesId` INT(11) NULL DEFAULT NULL ,
  `perControllerId` INT(11) NULL DEFAULT NULL ,
  `perAccion` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  `perEstado` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  PRIMARY KEY (`perId`) ,
  INDEX `permisos_roles_idx` (`perRolesId` ASC) ,
  INDEX `permisos_controllers_idx` (`perControllerId` ASC) ,
  CONSTRAINT `fkpermisosControllers`
    FOREIGN KEY (`perControllerId` )
    REFERENCES `FactoryPage`.`tblControladores` (`conId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkPermisosRoles`
    FOREIGN KEY (`perRolesId` )
    REFERENCES `FactoryPage`.`tblRoles` (`rolId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblUsuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblUsuarios` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblUsuarios` (
  `usuId` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuNombre` VARCHAR(45) NOT NULL ,
  `usuApellido` VARCHAR(45) NOT NULL ,
  `usuTelefono` VARCHAR(45) NULL ,
  `usuEmail` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuUsuario` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuPassword` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuRole` INT(11) NOT NULL ,
  `usuEstado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `usuImagen` VARCHAR(255) NULL ,
  PRIMARY KEY (`usuId`) ,
  INDEX `usuarios_roles_idx` (`usuRole` ASC) ,
  CONSTRAINT `fkUsuariosRoles`
    FOREIGN KEY (`usuRole` )
    REFERENCES `FactoryPage`.`tblRoles` (`rolId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblCategorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblCategorias` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblCategorias` (
  `catId` INT NOT NULL ,
  `catCategoria` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`catId`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblArticulos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblArticulos` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblArticulos` (
  `artId` INT NOT NULL ,
  `artNombre` VARCHAR(45) NOT NULL ,
  `artTitulo` VARCHAR(45) NOT NULL ,
  `artContenido` TEXT NOT NULL ,
  `artAutor` INT(11) NULL ,
  `artModificador` INT(11) NULL ,
  `artCategorias` INT NOT NULL ,
  `artEstado` TINYINT(1) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`artId`) ,
  INDEX `fkArticulosAutor` (`artAutor` ASC) ,
  INDEX `fkArticulosModificador` (`artModificador` ASC) ,
  INDEX `fkArticulosCategorias` (`artCategorias` ASC) ,
  CONSTRAINT `fkArticulosAutor`
    FOREIGN KEY (`artAutor` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkArticulosModificador`
    FOREIGN KEY (`artModificador` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkArticulosCategorias`
    FOREIGN KEY (`artCategorias` )
    REFERENCES `FactoryPage`.`tblCategorias` (`catId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '\n';


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblFases`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblFases` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblFases` (
  `fasId` INT NOT NULL ,
  `fasTipo` VARCHAR(45) NULL ,
  PRIMARY KEY (`fasId`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblProyectos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblProyectos` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblProyectos` (
  `proId` INT NOT NULL ,
  `proNombre` VARCHAR(45) NULL ,
  `proDescripcion` VARCHAR(45) NULL ,
  `proFechaPostulacion` VARCHAR(45) NULL ,
  `proFechaInicio` VARCHAR(45) NULL ,
  `proFechaFinal` VARCHAR(45) NULL ,
  `proCantidadUsuarios` VARCHAR(45) NULL ,
  `proCantidadMaximoUsuarios` VARCHAR(45) NULL ,
  `proCantidadMinimaUsuarios` VARCHAR(45) NULL ,
  `proIdFase` INT NULL ,
  `proEstado` INT NOT NULL DEFAULT 1 ,
  `tblFases_fasId` INT NOT NULL ,
  PRIMARY KEY (`proId`) ,
  INDEX `fk_tblProyectos_tblFases1` (`tblFases_fasId` ASC) ,
  CONSTRAINT `fk_tblProyectos_tblFases1`
    FOREIGN KEY (`tblFases_fasId` )
    REFERENCES `FactoryPage`.`tblFases` (`fasId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblUsuarios_X_tblProyectos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblUsuarios_X_tblProyectos` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblUsuarios_X_tblProyectos` (
  `usuProId` INT NOT NULL ,
  `tblUsuarios_usuId` INT(11) NOT NULL ,
  `tblProyectos_proId` INT NOT NULL ,
  `usuProRoles` INT NOT NULL ,
  PRIMARY KEY (`usuProId`) ,
  INDEX `fk_tblUsuarios_has_tblProyectos_tblProyectos1` (`tblProyectos_proId` ASC) ,
  INDEX `fk_tblUsuarios_has_tblProyectos_tblUsuarios1` (`tblUsuarios_usuId` ASC) ,
  CONSTRAINT `fk_tblUsuarios_has_tblProyectos_tblUsuarios1`
    FOREIGN KEY (`tblUsuarios_usuId` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblUsuarios_has_tblProyectos_tblProyectos1`
    FOREIGN KEY (`tblProyectos_proId` )
    REFERENCES `FactoryPage`.`tblProyectos` (`proId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblIntereses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblIntereses` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblIntereses` (
  `intId` INT NOT NULL ,
  `intNombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`intId`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblUsuarios_X_tblIntereses`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `FactoryPage`.`tblUsuarios_X_tblIntereses` ;

CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblUsuarios_X_tblIntereses` (
  `usuIntId` INT NOT NULL ,
  `tblUsuarios_usuId` INT(11) NOT NULL ,
  `tblIntereses_intId` INT NOT NULL ,
  PRIMARY KEY (`usuIntId`) ,
  INDEX `fk_tblUsuarios_has_tblIntereses_tblIntereses1` (`tblIntereses_intId` ASC) ,
  INDEX `fk_tblUsuarios_has_tblIntereses_tblUsuarios1` (`tblUsuarios_usuId` ASC) ,
  CONSTRAINT `fk_tblUsuarios_has_tblIntereses_tblUsuarios1`
    FOREIGN KEY (`tblUsuarios_usuId` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblUsuarios_has_tblIntereses_tblIntereses1`
    FOREIGN KEY (`tblIntereses_intId` )
    REFERENCES `FactoryPage`.`tblIntereses` (`intId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
