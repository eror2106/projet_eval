<?php

define("PASS", "ldLPp2NZ7JzkO7w88WNhzgGk5zC");


try {
  if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "developement") == 0) {
    $db = new PDO(
      'mysql:host=localhost;dbname=rubiks;charset=utf8',
      'root',
      ''
    );
  }
  if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0) {



    $db = new PDO(
      'mysql:host=109.234.164.161',
      $_SERVER['DB_NAME'],
      $_SERVER['DB_USER'],
      $_SERVER['DB_PASSWORD']
    );
  }
} catch (PDOException $e) {
  die("Erreur : " . $e->getMessage());
}
