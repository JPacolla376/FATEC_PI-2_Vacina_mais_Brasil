<?php

include_once("conexao.php");

class Vacinou extends Conectar {

  public function inserirVacinaUsuario($cpf_usr, $id_vacina, $data_vacinado) {
    try {
      $sql = "SELECT * FROM usuario WHERE CPF = '$cpf_usr'";
      $stmt_usr = $this->getConn()->query($sql)->fetch();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    try {
      $sql = "SELECT * FROM vacinas WHERE `ID` = $id_vacina";
      $stmt_vac = $this->getConn()->query($sql)->fetch();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    if ($stmt_usr != false && $stmt_vac != false) {
      try {
        $sql = "INSERT INTO vacinou (fk_Usuario_CPF, fk_Vacinas_ID, Data_Vacinado) VALUES ('$cpf_usr', $id_vacina, '$data_vacinado')";
        $stmt = $this->getConn()->exec($sql);
      } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    } else {
      var_dump($stmt_vac);
      echo "ID da vacina ou o CPF do usuário está errado";
    }
  }

  public function MostrarVacinasTomadas() {
    try {
      $usuario = $_SESSION['usuario'];
      $sql = "SELECT * FROM usuario u INNER JOIN vacinou vu INNER JOIN vacinas v ON u.CPF = vu.fk_Usuario_CPF AND v.ID = vu.fk_Vacinas_ID WHERE u.Nome = '$usuario'";
      $stmt = $this->getConn()->query($sql);
      if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch()) {
          echo "<div class='col-lg-4 col-md-6 d-flex align-items-stretch'>" .
               "<div class='icon-box'>" .
               "<div class='icon'> <i class='bi bi-eyedropper'></i></div>" .
               "<h4>" . $row["Nome"] . "</h4>" . 
               "<h5> Origem: " . $row["Origem"] . "</h5>" .
               "<h5> Data Vacinado: " . $row["Data_Vacinado"] . "</h5>" .
               "</div>" .
               "</div>";
        }
      } else {
        echo "<div class='col-lg-4 col-md-6 d-flex align-items-stretch'>" .
             "<div class='icon-box'>" .
             "<div class='icon'> <i class='bi bi-eyedropper'></i></div>" .
             "<h5>NÃO TEM VACINAS</h5>" .
             "</div>" .
             "</div>";
      }
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
  }
}

?>