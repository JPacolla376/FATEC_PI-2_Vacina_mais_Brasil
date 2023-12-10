<?php

class Conectar {
  protected $servername = "127.0.0.1";
  protected $username = "root";
  protected $password = "";
  protected $dbname = "vacinabrasil";
  protected $conn;

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

  public function __destruct() {
    $this->fecharConexao();
  }
}

?>