<?php
//$id:db.php

$dsn = 'mysql:host=localhost;dbname=promotion;charset=utf8mb4';
$db_user = 'user';
$db_pass = 'password';

try {
  $dbh = new PDO($dsn, $db_user, $db_pass);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  exit('データベース接続失敗。' . $e->getMessage());
}