<?php

include_once("conexao.php");

class Vacinou extends Conectar {

  public function inserirVacinaUsuario($cpf_usr, $id_vacina, $data_vacinado) {
    try {
      $sql = "SELECT * FROM usuario WHERE CPF = $cpf_usr";
      $stmt_usr = $this->getConn()->query($sql)->fetch();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    try {
      $sql = "SELECT * FROM vacinas WHERE ID = $id_vacina";
      $stmt_vac = $this->getConn()->query($sql)->fetch();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    if ($stmt_usr != false && $stmt_vac != false) {
      try {
        $sql = "INSERT INTO vacinou (fk_Usuario_CPF, fk_Vacinas_ID, Data_Vacinado) VALUES (:cpf_usr, :id_vacina, ':data_vacinado')";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindParam(':cpf_usr', $cpf_usr);
        $stmt->bindParam(':id_vacina', $id_vacina);
        $stmt->bindParam(':data_vacinado', $data_vacinado);
        $stmt->execute();
      } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    } else {
      echo "ID da vacina ou o CPF do usuário está errado";
    }
  }
}

?>