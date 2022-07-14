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

  $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;


  try {
    $db = new PDO($dsn, DBUSER, DBPASS);
    $db->exec("SET NAMES utf8");
  } catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
  }
  
  ?>
</body>

</html>