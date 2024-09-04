<?php

require_once 'Database.php';

class User{

    private $pdo;

    public function __construct(Database $database) {
        $this->pdo = $database->getPdo();
    }

    public function register($username, $email, $password){

        $username = trim($username);
        $email = trim($email);
        $password = trim($password);

        if(empty($username) || empty($email) || empty($password)){
            throw new Exception("Minden mezőt ki kell tölteni!");
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        if($stmt->rowCount() > 0){
            throw new Exception("Ez az email cím már használatban van!");
        }

        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
        if($stmt->execute(['username' => $username, 'email' => $email, 'password' => $password])){
            return 'Regisztráció sikeres!';
        }
        else{
            throw new Exception('Hiba történt a regisztrációt során');
        }
    }
}


?>