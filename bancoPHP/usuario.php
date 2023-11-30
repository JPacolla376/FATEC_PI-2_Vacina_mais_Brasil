<?php

include_once("conexao.php");
include_once("header.php");

class Usuario extends Conectar {

  public function cadastrar($cpf, $nome, $idade, $email, $senha) {
    try {
      $sql = "INSERT INTO usuario (CPF, Nome, Idade, E_mail, senha) VALUES ('$cpf', '$nome', $idade, '$email', '$senha')";
      $stmt = $this->getConn()->exec($sql);
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function login($cpf, $senha) {
    try {
      $sql = "SELECT login('$cpf', '$senha')";
      $stmt = $this->getConn()->prepare($sql);
      $stmt->execute();
      $user = $stmt->fetch();
      if ($user[0] != '0') {
        session_start();
        $_SESSION['status'] = true;
        $_SESSION['usuario'] = $user[0];
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
}

?>