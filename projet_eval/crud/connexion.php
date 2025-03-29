 <?php

  define("PASS", "ldLPp2NZ7JzkO7w88WNhzgGk5zC");
  $_SERVER['ENVIRONMENT_TYPE'] = "development";

  try {


    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "development") == 0) {
      $db = new PDO(
        'mysql:host=localhost;dbname=rubiks;charset=utf8',
        'root',
        ''
      );
    }
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "public") == 0) {



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

  use function PHPSTORM_META\type;



  ?>