<?php

include_once("conexao.php");

class Vacinas extends Conectar {
  private $id, $nome, $origem, $data_validade, $data_fabricacao, $conec;

  public function inserirVacina($id, $nome, $origem, $data_validade, $data_fabricacao) {
    $this->id = $id;
    $this->nome = $nome;
    $this->origem = $origem;
    $this->data_validade = $data_validade;
    $this->data_fabricacao =$data_fabricacao;

    try {
      $sql = "INSERT INTO vacinas (ID, Nome, Origem, Data_Validade, Data_Fabricacao) VALUES ($id, '$nome', '$origem', '$data_validade', '$data_fabricacao')";
      $stmt = $this->conec->getConn()->query($sql);
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}

?>