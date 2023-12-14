<?php

include_once("conexao.php");

class Usuario extends Conectar {

  public function cadastrar($cpf, $nome, $data_nasc, $email, $senha) {
    try {
      $sql = "INSERT INTO usuario (CPF, Nome, Data_Nascimento, E_mail, senha) VALUES ('$cpf', '$nome', '$data_nasc', '$email', '$senha')";
      $stmt = $this->getConn()->exec($sql);
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function login($cpf, $senha) {
    try {
      $sql = "CALL login('$cpf', '$senha')";
      $stmt = $this->getConn()->prepare($sql);
      $stmt->execute();
      $user = $stmt->fetch();
      if ($user[0] != null) {
        $_SESSION['status'] = true;
        $_SESSION['usuario'] = $user[0];
        header("location: ../HTML/index.php");
      } else {
        $_SESSION['status'] = false;
      }
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function mostrarUsuario($nome) {
    try {
      $sql = "SELECT * FROM usuario WHERE nome = '$nome'";
      $stmt = $this->getConn()->prepare($sql);
      $stmt->execute();
      $user = $stmt->fetch();
      $_SESSION['cpf'] = $user[0];
      $_SESSION['data_nasc'] = $user[2];
      $_SESSION['email'] = $user[3];
      $_SESSION['senha'] = $user[4];
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }

  public function atualizarSenha($cpf, $nvsenha) {
    try {
      $sql = "UPDATE usuario SET senha = '$nvsenha' WHERE CPF = '$cpf'";
      $stmt = $this->getConn()->query($sql);
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}

?>