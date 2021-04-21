<?php

$servername = 'localhost';
$username = 'newuser';
$password = 'user_password';

try{
$pdo = new PDO("mysql:host=$servername;dbname=ubi_assignment",$username,$password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>