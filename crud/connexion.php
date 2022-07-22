
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
        'mysql:host=localhost;dbname=rubiks;charset=utf8',
        'root',
        ''
      );



      $db = new PDO('mysql:host=109.234.164.161;dbname= sc1lgvu9627_bocace-stephane.projet-final;charset=utf8', 'sc1lgvu9627_stephane','I0mkWzR5zHuc');
      
    }
  } catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
  }
