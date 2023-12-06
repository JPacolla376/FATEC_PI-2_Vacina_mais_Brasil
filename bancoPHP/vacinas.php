<?php

include_once("conexao.php");

class Vacinas extends Conectar {

  public function inserirVacina($id, $nome, $origem, $data_validade, $data_fabricacao) {
    try {
      $sql = "INSERT INTO vacinas (ID, Nome, Origem, Data_Validade, Data_Fabricacao) VALUES ($id, '$nome', '$origem', '$data_validade', '$data_fabricacao')";
      $stmt = $this->getConn()->exec($sql);
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}

?>