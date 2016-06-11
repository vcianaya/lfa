CREATE TABLE `bd_restaurant`.`persona` (
  `CI_PER` INT NOT NULL,
  `NOM_PER` VARCHAR(45) NULL,
  `APP_PER` VARCHAR(45) NULL,
  `APM_PER` VARCHAR(45) NULL,
  `TEL_PER` INT NULL,
  `EMA_PER` VARCHAR(45) NULL,
  `DIR_PER` VARCHAR(45) NULL,
  `FEC_NAC` DATE NULL,
  `CUENTA` INT NULL,
  PRIMARY KEY (`CI_PER`));

CREATE TABLE `bd_restaurant`.`cuenta` (
  `ID_CUENTA` INT NOT NULL AUTO_INCREMENT,
  `NICK` VARCHAR(15) NULL,
  `PASS` VARCHAR(10) NULL,
  `NIVEL` VARCHAR(45) NULL,
  PRIMARY KEY (`ID_CUENTA`));

CREATE TABLE `bd_restaurant`.`plato` (
  `ID_PLA` INT NOT NULL AUTO_INCREMENT,
  `NOM_PLA` VARCHAR(100) NULL,
  `DES_PLA` VARCHAR(200) NULL,
  `PRE_PLA` DOUBLE NULL,
  `STO_PLA` INT NULL,
  `EST_PLA` INT NULL,
  `CUENTA` INT NULL,
  PRIMARY KEY (`ID_PLA`));

CREATE TABLE `bd_restaurant`.`menu` (
  `ID_MENU` INT NOT NULL AUTO_INCREMENT,
  `NOM_MENU` VARCHAR(100) NULL,
  `DES_MENU` VARCHAR(200) NULL,
  `CUENTA` INT NULL,
  PRIMARY KEY (`ID_MENU`));

CREATE TABLE `bd_restaurant`.`pedido` (
  `ID_PED` INT NOT NULL,
  `CUENTA` INT NULL,
  `FEC_PED` DATE NULL,
  PRIMARY KEY (`ID_PED`));

CREATE TABLE `bd_restaurant`.`detalle_pedido` (
  `ID_DET` int(11) NOT NULL,
  `NOM_PLATO` varchar(100) DEFAULT NULL,
  `PRECIO` DOUBLE DEFAULT NULL,
  `PEDIDO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_DET`));

CREATE TABLE `bd_restaurant`.`sugerencia` (
  `ID_SUG` INT NOT NULL AUTO_INCREMENT,
  `DES_SUG` TEXT NULL,
  `FEC_SUG` DATE NULL,
  `CUENTA` INT NULL,
  PRIMARY KEY (`ID_SUG`));

CREATE TABLE `bd_restaurant`.`menuitem` (
  `ID_ITE` INT NOT NULL AUTO_INCREMENT,
  `NOM_PLA` VARCHAR(45) NULL,
  `PRE_PLA` VARCHAR(45) NULL,
  `ID_PLA` INT NULL,
  `ID_MENU` INT NULL,
  PRIMARY KEY (`ID_ITE`));


ALTER TABLE `bd_restaurant`.`persona` 
ADD INDEX `cuentaPersona_idx` (`CUENTA` ASC);
ALTER TABLE `bd_restaurant`.`persona` 
ADD CONSTRAINT `cuentaPersona`
  FOREIGN KEY (`CUENTA`)
  REFERENCES `bd_restaurant`.`cuenta` (`ID_CUENTA`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bd_restaurant`.`plato` 
ADD INDEX `cuentaPlato_idx` (`CUENTA` ASC);
ALTER TABLE `bd_restaurant`.`plato` 
ADD CONSTRAINT `cuentaPlato`
  FOREIGN KEY (`CUENTA`)
  REFERENCES `bd_restaurant`.`cuenta` (`ID_CUENTA`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bd_restaurant`.`sugerencia` 
ADD INDEX `cuentaSugerencia_idx` (`CUENTA` ASC);
ALTER TABLE `bd_restaurant`.`sugerencia` 
ADD CONSTRAINT `cuentaSugerencia`
  FOREIGN KEY (`CUENTA`)
  REFERENCES `bd_restaurant`.`cuenta` (`ID_CUENTA`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bd_restaurant`.`menu` 
ADD INDEX `cuentaMenu_idx` (`CUENTA` ASC);
ALTER TABLE `bd_restaurant`.`menu` 
ADD CONSTRAINT `cuentaMenu`
  FOREIGN KEY (`CUENTA`)
  REFERENCES `bd_restaurant`.`cuenta` (`ID_CUENTA`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bd_restaurant`.`pedido` 
ADD INDEX `cuentaPedido_idx` (`CUENTA` ASC);
ALTER TABLE `bd_restaurant`.`pedido` 
ADD CONSTRAINT `cuentaPedido`
  FOREIGN KEY (`CUENTA`)
  REFERENCES `bd_restaurant`.`cuenta` (`ID_CUENTA`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bd_restaurant`.`detalle_pedido` 
ADD INDEX `pedidoDetalle_idx` (`PEDIDO` ASC);
ALTER TABLE `bd_restaurant`.`detalle_pedido` 
ADD CONSTRAINT `pedidoDetalle`
  FOREIGN KEY (`PEDIDO`)
  REFERENCES `bd_restaurant`.`pedido` (`ID_PED`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `bd_restaurant`.`menuitem` 
ADD INDEX `menuitemPlato_idx` (`ID_PLA` ASC),
ADD INDEX `menuitemMenu_idx` (`ID_MENU` ASC);
ALTER TABLE `bd_restaurant`.`menuitem` 
ADD CONSTRAINT `menuitemPlato`
  FOREIGN KEY (`ID_PLA`)
  REFERENCES `bd_restaurant`.`plato` (`ID_PLA`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `menuitemMenu`
  FOREIGN KEY (`ID_MENU`)
  REFERENCES `bd_restaurant`.`menu` (`ID_MENU`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
