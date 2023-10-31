<?php

include_once("conexao.php");
include_once("header.php");

class Usuario {
  private $cpf, $nome, $idade, $email, $senha, $conec;

  public function __construct() {
    $this->conec = new Conectar();
  }

  public function inserirUsuario($cpf, $nome, $idade, $email, $senha) {
    $this->cpf = $cpf;
    $this->nome = $nome;
    $this->idade = $idade;
    $this->email = $email;
    $this->senha = $senha;

    try {
      $sql = "INSERT INTO usuario (CPF, Nome, Idade, E_mail, senha) VALUES ($cpf, '$nome', $idade, '$email', '$senha')";
      $stmt = $this->conec->getConn()->query($sql);
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function login($cpf, $senha) {
    try {
      $sql = "SELECT * FROM usuario WHERE CPF = $cpf AND senha = '$senha'";
      $stmt = $this->conec->getConn()->query($sql);
      $row = $stmt->fetch();
      if ($row != false) {
        session_start();
        $_SESSION['status'] = true;
        $_SESSION['usuario'] = $row['Nome'];
        echo "Conectado o " . $_SESSION['usuario'];
        //header("location: ");
      } else {
        $_SESSION['status'] = false;
        echo "NÃO!!!!!";
      }
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function __destruct() {
    $this->conec->fecharConexao();
  }
}

?>