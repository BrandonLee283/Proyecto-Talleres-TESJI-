/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : talleestesji

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 07/07/2022 19:20:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alumno
-- ----------------------------
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE `alumno`  (
  `NUMERO_CONTROL_ALUMNO` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NOMBRE_ALUMNO` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `APELLIDOP_ALUMNO` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `APELLIDOM_ALUMNO` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TELEFONO_ALUMNO` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `EMAIL_ALUMNO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ID_CARRERA` int(11) NOT NULL,
  `ID_TALLER` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`NUMERO_CONTROL_ALUMNO`) USING BTREE,
  INDEX `ID_CARRERA`(`ID_CARRERA`) USING BTREE,
  INDEX `ID_TALLER`(`ID_TALLER`) USING BTREE,
  INDEX `ID_ROL`(`ID_ROL`) USING BTREE,
  CONSTRAINT `ID_CARRERA` FOREIGN KEY (`ID_CARRERA`) REFERENCES `carrera` (`ID_CARRERA`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `ID_ROL` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `ID_TALLER` FOREIGN KEY (`ID_TALLER`) REFERENCES `taller` (`ID_TALLER`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alumno
-- ----------------------------
INSERT INTO `alumno` VALUES ('201923139', 'Brandon', 'Reyes', 'Moreno', '1234445678', 'brandonLee@gmail.com', 1, 6, 1);
INSERT INTO `alumno` VALUES ('201923158', 'Juan', 'Figueroa', 'Trejo', '7731271279', 'juan@mail.com', 4, 4, 1);
INSERT INTO `alumno` VALUES ('201923172', 'Luis Fernando', 'Cruz', 'Reyes', '1234567890', 'fer@gmail.com', 3, 1, 1);
INSERT INTO `alumno` VALUES ('201923197', 'Omar', 'Aranda', 'Almaraz', '5530762836', 'omar.com', 1, 1, 1);
INSERT INTO `alumno` VALUES ('20192323', 'KARENSUCHI', 'Martinez', 'Carpio', '7789098765', 'karenmartinez.mc11@gmail.com', 1, 1, 1);
INSERT INTO `alumno` VALUES ('201923523', 'Karen', 'Martinez', 'Carpio', '5522165966', 'karenmartz@gmail.com', 4, 2, 1);

-- ----------------------------
-- Table structure for carrera
-- ----------------------------
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE `carrera`  (
  `ID_CARRERA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CARRERA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `STATUS_CARRERA` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_CARRERA`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of carrera
-- ----------------------------
INSERT INTO `carrera` VALUES (1, 'Ingenieria en Sistemas Computacionales', 1);
INSERT INTO `carrera` VALUES (2, 'Licenciatura en Administracion', 1);
INSERT INTO `carrera` VALUES (3, 'Ingenieria Quimica', 1);
INSERT INTO `carrera` VALUES (4, 'Ingenieria en Mecatronica', 1);
INSERT INTO `carrera` VALUES (5, 'Ingenieria Civil', 1);
INSERT INTO `carrera` VALUES (6, 'Ingenieria en Logistica', 1);
INSERT INTO `carrera` VALUES (7, 'Ingenieria Industrial', 1);

-- ----------------------------
-- Table structure for horarios
-- ----------------------------
DROP TABLE IF EXISTS `horarios`;
CREATE TABLE `horarios`  (
  `CLAVE_HORARIO` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TURNO_HORARIO` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DESCRIPCION_HORARIOS` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `STATUS_HORARIOS` tinyint(4) NOT NULL,
  PRIMARY KEY (`CLAVE_HORARIO`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of horarios
-- ----------------------------
INSERT INTO `horarios` VALUES ('mat001', 'Matutino', '9 a 11', 1);
INSERT INTO `horarios` VALUES ('ves002', 'Vespertino', '5 a 7', 1);
INSERT INTO `horarios` VALUES ('ves003', 'Vespertino', '3 a 5', 1);

-- ----------------------------
-- Table structure for personal
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal`  (
  `NUMERO_CONTROL_PERSONAL` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NOMBRE_PERSONAL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `APELLIDOP_PERSONAL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `APELLIDOM_PERSONAL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TELEFONO_PERSONAL` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `EMAIL_PERSONAL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`NUMERO_CONTROL_PERSONAL`) USING BTREE,
  INDEX `ID_ROL_PERSONAL`(`ID_ROL`) USING BTREE,
  CONSTRAINT `ID_ROL_PERSONAL` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal
-- ----------------------------
INSERT INTO `personal` VALUES ('12345789', 'Juan', 'Figueroa', 'Trejo', '1010101010', 'juanchis@outlook.com', 3);

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `STATUS_ROL` bit(1) NOT NULL,
  PRIMARY KEY (`ID_ROL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'Estudiante', b'1');
INSERT INTO `rol` VALUES (2, 'Docentes', b'1');
INSERT INTO `rol` VALUES (3, 'Administrativo', b'1');
INSERT INTO `rol` VALUES (4, 'Visitante', b'1');

-- ----------------------------
-- Table structure for taller
-- ----------------------------
DROP TABLE IF EXISTS `taller`;
CREATE TABLE `taller`  (
  `ID_TALLER` int(11) NOT NULL,
  `NOMBRE_TALLER` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DESCRIPCION_TALLER` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `STATUS_TALLER` tinyint(4) NOT NULL,
  `CLAVE_HORARIO` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_TALLER`) USING BTREE,
  INDEX `CLAVE_HORARIO`(`CLAVE_HORARIO`) USING BTREE,
  CONSTRAINT `CLAVE_HORARIO` FOREIGN KEY (`CLAVE_HORARIO`) REFERENCES `horarios` (`CLAVE_HORARIO`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of taller
-- ----------------------------
INSERT INTO `taller` VALUES (1, 'Basquetball', 'Deporte fisco con balon', 1, 'ves002');
INSERT INTO `taller` VALUES (2, 'Futbol', 'Deporte Fisico con balon', 1, 'mat001');
INSERT INTO `taller` VALUES (3, 'Voleibol', 'Deporte fisico con balon', 1, 'ves003');
INSERT INTO `taller` VALUES (4, 'Danza', 'Baile', 1, 'ves002');
INSERT INTO `taller` VALUES (5, 'Taekwondo', 'Defensa Personal', 1, 'mat001');
INSERT INTO `taller` VALUES (6, 'Ajedrez', 'Pensamiento y habilidades', 1, 'mat001');

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `MATRICULA_USUARIO` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CONTRASENIA` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`) USING BTREE,
  INDEX `fk_usuario_rol`(`ID_ROL`) USING BTREE,
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, '201923172', 'fer123', 1);
INSERT INTO `usuario` VALUES (2, '12345789', '1234', 3);
INSERT INTO `usuario` VALUES (3, '201923158', '1111', 1);
INSERT INTO `usuario` VALUES (4, '123456788', '2222', 3);
INSERT INTO `usuario` VALUES (5, '201923999', '0000', 1);
INSERT INTO `usuario` VALUES (6, '201923111', '3333', 1);
INSERT INTO `usuario` VALUES (7, '201923222', '2222', 1);
INSERT INTO `usuario` VALUES (8, '201923197', '7890', 1);

-- ----------------------------
-- Procedure structure for sp_actualizar_alumno
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_actualizar_alumno`;
delimiter ;;
CREATE PROCEDURE `sp_actualizar_alumno`(p_NUMERO_CONTROL_ALUMNO VARCHAR(15),
p_NOMBRE_ALUMNO VARCHAR(50),
p_APELLIDOP_ALUMNO VARCHAR(50),
p_APELLIDOM_ALUMNO VARCHAR(50),
p_TELEFONO_ALUMNO VARCHAR(15),
p_EMAIL_ALUMNO VARCHAR(255),
p_ID_CARRERA INT,
p_ID_TALLER INT)
BEGIN

update alumno set NOMBRE_ALUMNO= p_NOMBRE_ALUMNO,
	APELLIDOP_ALUMNO=p_APELLIDOP_ALUMNO,
	APELLIDOM_ALUMNO=p_APELLIDOM_ALUMNO,
	TELEFONO_ALUMNO=p_TELEFONO_ALUMNO,
				EMAIL_ALUMNO=p_EMAIL_ALUMNO,
				ID_CARRERA=p_ID_CARRERA,
				ID_TALLER=p_ID_TALLER,
				ID_ROL='1'
				 WHERE NUMERO_CONTROL_ALUMNO= p_NUMERO_CONTROL_ALUMNO;

END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_insertar_alumno
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_insertar_alumno`;
delimiter ;;
CREATE PROCEDURE `sp_insertar_alumno`(p_NUMERO_CONTROL_ALUMNO VARCHAR(15),
p_NOMBRE_ALUMNO VARCHAR(50),
p_APELLIDOP_ALUMNO VARCHAR(50),
p_APELLIDOM_ALUMNO VARCHAR(50),
p_TELEFONO_ALUMNO VARCHAR(15),
p_EMAIL_ALUMNO VARCHAR(255),
p_ID_CARRERA INT,
p_ID_TALLER INT)
BEGIN
DECLARE MATRICULA VARCHAR(15);
SELECT  alumno.NUMERO_CONTROL_ALUMNO INTO MATRICULA FROM alumno
WHERE alumno.NUMERO_CONTROL_ALUMNO =TRIM(p_NUMERO_CONTROL_ALUMNO);
IF TRIM(p_NUMERO_CONTROL_ALUMNO)=MATRICULA THEN 
SELECT 'EL ALUMNO QUE DESEA INSERTAR YA EXISTE'
AS MENSAJEBD;
ELSE
INSERT alumno VALUES(
p_NUMERO_CONTROL_ALUMNO,
p_NOMBRE_ALUMNO,
p_APELLIDOP_ALUMNO,
p_APELLIDOM_ALUMNO,
p_TELEFONO_ALUMNO,
p_EMAIL_ALUMNO,
p_ID_CARRERA,
p_ID_TALLER,
'1');
SELECT 'REGISTRO INSERTADO'
AS MENSAJEBD01;
END IF;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_ver_alumno
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_ver_alumno`;
delimiter ;;
CREATE PROCEDURE `sp_ver_alumno`(p_NUMERO_CONTROL_ALUMNO VARCHAR(15))
BEGIN

SELECT NUMERO_CONTROL_ALUMNO, NOMBRE_ALUMNO, APELLIDOP_ALUMNO, APELLIDOM_ALUMNO, TELEFONO_ALUMNO, EMAIL_ALUMNO, NOMBRE_CARRERA, NOMBRE_TALLER
 FROM alumno INNER JOIN carrera ON alumno.ID_CARRERA= carrera.ID_CARRERA 
 INNER JOIN  taller ON alumno.ID_TALLER= taller.ID_TALLER
 WHERE NUMERO_CONTROL_ALUMNO= p_NUMERO_CONTROL_ALUMNO; 
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for sp_ver_usuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_ver_usuario`;
delimiter ;;
CREATE PROCEDURE `sp_ver_usuario`(p_MATRICULA_USUARIO VARCHAR(255))
BEGIN
	SELECT usuario.MATRICULA_USUARIO, 
	usuario.CONTRASENIA, 
	usuario.ID_ROL, 
	rol.NOMBRE_ROL FROM usuario
INNER JOIN rol ON usuario.ID_ROL=rol.ID_ROL WHERE usuario.MATRICULA_USUARIO=p_MATRICULA_USUARIO;

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
