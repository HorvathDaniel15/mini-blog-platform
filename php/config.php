<?php 

$host = 'localhost';
$db = 'blog';
$user = 'root';
$pass = '';

require_once 'Database.php';
$database = new Database($host, $db, $user, $pass);

?>