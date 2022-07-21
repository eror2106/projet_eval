<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  define("DBHOST", "localhost");
  define("DBUSER", "root");
  define("DBPASS", "");
  define("DBNAME", "rubiks");
  define("PASS", "ldLPp2NZ7JzkO7w88WNhzgGk5zC");
  $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;






  try {



    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "development") == 0) {
      $db = new PDO($dsn, DBUSER, DBPASS);
      $db->exec("SET NAMES utf8");
    }
    if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0) {
      $db = new PDO($dsn, $_SERVER['DB_USER'], $_SERVER['DB_PASSWORD']);
      $db->exec("SET NAMES utf8");
    } /*
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");*/
  } catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
  }

  ?>
</body>

</html>