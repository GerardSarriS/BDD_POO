<?php 
  class Database{
    private $server;
    private $username;
    private $password;
    private $database;


    public function __construct(){
    
      $this-> server = 'mysql-gerardss.alwaysdata.net';
      $this-> username ='gerardss';
      $this-> password ='973540040Gs';
      $this-> database = 'gerardss_php_login_database';
    }

    public function connect(){
      $conn = new mysqli($this->server, $this->username, $this->password, $this->database);
      return $conn;
    }
  }

?>