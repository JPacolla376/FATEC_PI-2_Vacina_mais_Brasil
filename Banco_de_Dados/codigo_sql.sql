-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- criando o banco de dados
CREATE DATABASE IF NOT EXISTS `vacinabrasil`;

USE `vacinabrasil`;

-- Copiando estrutura para tabela vacinabrasil.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `CPF` varchar(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Data_Nascimento` date NOT NULL,
  `E_mail` varchar(60) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vacinabrasil.vacinas
CREATE TABLE IF NOT EXISTS `vacinas` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Origem` varchar(30) NOT NULL,
  `Data_Validade` date NOT NULL,
  `Data_Fabricacao` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela vacinabrasil.vacinou
CREATE TABLE IF NOT EXISTS `vacinou` (
  `fk_Usuario_CPF` varchar(11) NOT NULL,
  `fk_Vacinas_ID` int(11) NOT NULL,
  `Data_Vacinado` date NOT NULL,
  KEY `fk_Usuario_CPF` (`fk_Usuario_CPF`),
  KEY `fk_Vacinas_ID` (`fk_Vacinas_ID`),
  CONSTRAINT `vacinou_ibfk_1` FOREIGN KEY (`fk_Usuario_CPF`) REFERENCES `usuario` (`CPF`) ON DELETE CASCADE,
  CONSTRAINT `vacinou_ibfk_2` FOREIGN KEY (`fk_Vacinas_ID`) REFERENCES `vacinas` (`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
