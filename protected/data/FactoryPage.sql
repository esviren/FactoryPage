SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `FactoryPage` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `FactoryPage` ;

-- -----------------------------------------------------
-- Table `FactoryPage`.`tblControladores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblControladores` (
  `conId` INT(11) NOT NULL AUTO_INCREMENT ,
  `conNombre` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  PRIMARY KEY (`conId`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblAcciones`
-- -----------------------------------------------------
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
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblRoles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblRoles` (
  `rolId` INT(11) NOT NULL AUTO_INCREMENT ,
  `rolNombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `rolEstado` TINYINT(4) NULL DEFAULT '1' ,
  PRIMARY KEY (`rolId`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblUsuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblUsuarios` (
  `usuId` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuNombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuApellido` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuTelefono` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  `usuEmail` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuUsuario` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuPassword` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `usuRole` INT(11) NOT NULL DEFAULT '3' ,
  `usuEstado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `usuImagen` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  PRIMARY KEY (`usuId`) ,
  INDEX `usuarios_roles_idx` (`usuRole` ASC) ,
  CONSTRAINT `fkUsuariosRoles`
    FOREIGN KEY (`usuRole` )
    REFERENCES `FactoryPage`.`tblRoles` (`rolId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblCategorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblCategorias` (
  `catId` INT(11) NOT NULL ,
  `catCategoria` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  PRIMARY KEY (`catId`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblArticulos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblArticulos` (
  `artId` INT(11) NOT NULL ,
  `artNombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `artTitulo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `artContenido` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `artAutor` INT(11) NULL DEFAULT NULL ,
  `artModificador` INT(11) NULL DEFAULT NULL ,
  `artCategorias` INT(11) NOT NULL ,
  `artEstado` TINYINT(1) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`artId`) ,
  INDEX `fkArticulosAutor` (`artAutor` ASC) ,
  INDEX `fkArticulosModificador` (`artModificador` ASC) ,
  INDEX `fkArticulosCategorias` (`artCategorias` ASC) ,
  CONSTRAINT `fkArticulosAutor`
    FOREIGN KEY (`artAutor` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkArticulosCategorias`
    FOREIGN KEY (`artCategorias` )
    REFERENCES `FactoryPage`.`tblCategorias` (`catId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkArticulosModificador`
    FOREIGN KEY (`artModificador` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin
COMMENT = '\n';


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblFases`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblFases` (
  `fasId` INT(11) NOT NULL AUTO_INCREMENT ,
  `fasTipo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  PRIMARY KEY (`fasId`) )
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblIntereses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblIntereses` (
  `intId` INT(11) NOT NULL ,
  `intNombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  PRIMARY KEY (`intId`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblPermisos`
-- -----------------------------------------------------
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
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblProyectos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblProyectos` (
  `proId` INT(11) NOT NULL AUTO_INCREMENT ,
  `proNombre` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `proDescripcion` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `proFechaPostulacion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NOT NULL ,
  `proFechaInicio` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  `proFechaFinal` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_bin' NULL DEFAULT NULL ,
  `proCantidadUsuarios` INT(11) NULL DEFAULT NULL ,
  `proCantidadMaximoUsuarios` INT(11) NOT NULL ,
  `proCantidadMinimaUsuarios` INT(11) NOT NULL ,
  `proEstado` INT(11) NOT NULL DEFAULT '1' ,
  `tblFases_fasId` INT(11) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`proId`) ,
  INDEX `fk_tblProyectos_tblFases1` (`tblFases_fasId` ASC) ,
  CONSTRAINT `fk_tblProyectos_tblFases1`
    FOREIGN KEY (`tblFases_fasId` )
    REFERENCES `FactoryPage`.`tblFases` (`fasId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblUsuarios_X_tblIntereses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblUsuarios_X_tblIntereses` (
  `usuIntId` INT(11) NOT NULL ,
  `tblUsuarios_usuId` INT(11) NOT NULL ,
  `tblIntereses_intId` INT(11) NOT NULL ,
  PRIMARY KEY (`usuIntId`) ,
  INDEX `fk_tblUsuarios_has_tblIntereses_tblIntereses1` (`tblIntereses_intId` ASC) ,
  INDEX `fk_tblUsuarios_has_tblIntereses_tblUsuarios1` (`tblUsuarios_usuId` ASC) ,
  CONSTRAINT `fk_tblUsuarios_has_tblIntereses_tblIntereses1`
    FOREIGN KEY (`tblIntereses_intId` )
    REFERENCES `FactoryPage`.`tblIntereses` (`intId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblUsuarios_has_tblIntereses_tblUsuarios1`
    FOREIGN KEY (`tblUsuarios_usuId` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


-- -----------------------------------------------------
-- Table `FactoryPage`.`tblUsuarios_X_tblProyectos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `FactoryPage`.`tblUsuarios_X_tblProyectos` (
  `usuProId` INT(11) NOT NULL ,
  `tblUsuarios_usuId` INT(11) NOT NULL ,
  `tblProyectos_proId` INT(11) NOT NULL ,
  `usuProRoles` INT(11) NOT NULL ,
  PRIMARY KEY (`usuProId`) ,
  INDEX `fk_tblUsuarios_has_tblProyectos_tblProyectos1` (`tblProyectos_proId` ASC) ,
  INDEX `fk_tblUsuarios_has_tblProyectos_tblUsuarios1` (`tblUsuarios_usuId` ASC) ,
  CONSTRAINT `fk_tblUsuarios_has_tblProyectos_tblProyectos1`
    FOREIGN KEY (`tblProyectos_proId` )
    REFERENCES `FactoryPage`.`tblProyectos` (`proId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblUsuarios_has_tblProyectos_tblUsuarios1`
    FOREIGN KEY (`tblUsuarios_usuId` )
    REFERENCES `FactoryPage`.`tblUsuarios` (`usuId` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
