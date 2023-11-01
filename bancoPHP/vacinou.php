<?php

include_once("conexao.php");

class Vacinou {
  private $data_vacinado, $conec, $id_vacina, $cpf_usr;

  public function __construct() {
    $this->conec = new Conectar();
  }

  public function inserirVacinaUsuario($cpf_usr, $id_vacina, $data_vacinado) {
    try {
      $sql = "SELECT * FROM usuario WHERE CPF = $cpf_usr";
      $stmt_usr = $this->conec->getConn()->query($sql)->fetch();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    try {
      $sql = "SELECT * FROM vacinas WHERE ID = $id_vacina";
      $stmt_vac = $this->conec->getConn()->query($sql)->fetch();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    if ($stmt_usr != false && $stmt_vac != false) {
      $this->data_vacinado = $data_vacinado;
      $this->cpf_usr = $cpf_usr;
      $this->id_vacina = $id_vacina;

      try {
        $sql = "INSERT INTO vacinou (fk_Usuario_CPF, fk_Vacinas_ID, Data_Vacinado) VALUES ($cpf_usr, $id_vacina, '$data_vacinado')";
        $stmt = $this->conec->getConn()->query($sql);
      } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    } else {
      echo "ID da vacina ou o CPF do usuário está errado";
    }
  }

  public function __destruct() {
    $this->conec->fecharConexao();
  }
}

?>