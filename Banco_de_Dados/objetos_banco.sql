-- Active: 1696890039543@@127.0.0.1@3306@vacinabrasil
DELIMITER $$
-- procedure login()
CREATE OR REPLACE PROCEDURE login(IN cpfusr VARCHAR(11), IN senhausr VARCHAR(255))
BEGIN
  SELECT `Nome`
  FROM usuario 
  WHERE cpf = cpfusr AND senha = senhausr;
END $$

-- procedure user_vacina_existe()
CREATE OR REPLACE PROCEDURE user_vacina_existe(IN cpf_usr VARCHAR(11), IN id_vac INT, OUT saida_cpf VARCHAR(11), OUT saida_id INT)
BEGIN
  -- cpf do usuario
  SELECT `CPF` INTO saida_cpf
  FROM usuario 
  WHERE `CPF` = cpf_usr;
  -- id vacina
  SELECT `ID` INTO saida_id
  FROM vacinas 
  WHERE `ID` = id_vac;
END $$
DELIMITER ;
-- view mostrarVacinados
CREATE OR REPLACE VIEW mostrarVacinados AS
SELECT v.* FROM usuario u INNER JOIN vacinou vu INNER JOIN vacinas v 
ON u.CPF = vu.fk_Usuario_CPF 
AND v.ID = vu.fk_Vacinas_ID;