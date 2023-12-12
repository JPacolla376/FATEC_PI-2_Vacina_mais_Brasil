-- Active: 1697206708792@@127.0.0.1@3306@vacinabrasil
DELIMITER $$
-- procedure login()
CREATE OR REPLACE PROCEDURE login(IN cpfusr VARCHAR(11), IN senhausr VARCHAR(255))
BEGIN
  SELECT `Nome`
  FROM usuario 
  WHERE cpf = cpfusr AND senha = senhausr;
END $$
DELIMITER ;