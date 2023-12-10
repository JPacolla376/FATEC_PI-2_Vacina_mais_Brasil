-- Active: 1697206708792@@127.0.0.1@3306@vacinabrasil
DELIMITER $$

-- function login()
CREATE OR REPLACE FUNCTION login(cpf_usr VARCHAR(11), senha_usr VARCHAR(60)) RETURNS VARCHAR(60)
BEGIN
  DECLARE usuario VARCHAR(60);
  SELECT `Nome` INTO usuario FROM usuario WHERE CPF = cpf_usr AND senha = senha_usr;
  IF usuario IS NOT NULL THEN
    RETURN usuario;
  ELSE
    RETURN '0';
  END IF;
END $$
DELIMITER ;