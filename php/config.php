<?php 

$host = 'localhost';
$db = 'blog';
$user = 'root';
$pass = '';

require_once '../data/Database.php';
$database = new Database($host, $db, $user, $pass);

?>