<?php

class Conectar {
  private $servername = "127.0.0.1";
  private $username = "root";
  private $password = "";
  private $dbname = "vacinabrasil";
  private $conn = NULL;

  public function __construct() {
    try {
      $dsn = "mysql:host=$this->servername;dbname=$this->dbname";
      $this->conn = new PDO($dsn, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error Connection" . $e->getMessage();
    }
  }

  public function getConn() {
    return $this->conn;
  }

  public function fecharConexao() {
    $this->conn = NULL;
  }
}

?>