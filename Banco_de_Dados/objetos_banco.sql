-- Active: 1696890039543@@127.0.0.1@3306@vacinabrasil
DELIMITER $$
CREATE OR REPLACE FUNCTION login(cpf VARCHAR(11), senha VARCHAR(60)) RETURNS VARCHAR(60)
BEGIN
  DECLARE usuario VARCHAR(60);
  SELECT `Nome` INTO usuario FROM usuario WHERE CPF = cpf AND senha = senha;
  IF usuario IS NULL THEN
    RETURN usuario;
  ELSE
    RETURN '0';
  END IF;
END $$
DELIMITER ;