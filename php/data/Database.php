<?php

class Database {

    private $pdo;

    public function __construct($host, $db, $user, $pass) {

        try{
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            die("Could not connect to the database $db :" . $e->getMessage());
        }

    }

    public function getPdo() {
        return $this->pdo;
    }
}

?>