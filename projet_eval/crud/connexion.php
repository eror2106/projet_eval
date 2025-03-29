 <?php

  // define("PASS", "ldLPp2NZ7JzkO7w88WNhzgGk5zC");


  // try {
  //   if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "developement") == 0) {
  //     $db = new PDO(
  //       'mysql:host=localhost;dbname=rubiks;charset=utf8',
  //       'root',
  //       ''
  //     );
  //   }
  //   if (strcmp($_SERVER['ENVIRONMENT_TYPE'], "production") == 0) {



  //     $db = new PDO(
  //       'mysql:host=109.234.164.161',
  //       $_SERVER['DB_NAME'],
  //       $_SERVER['DB_USER'],
  //       $_SERVER['DB_PASSWORD']
  //     );
  //   }
  // } catch (PDOException $e) {
  //   die("Erreur : " . $e->getMessage());
  // } 


  define("PASS", "ldLPp2NZ7JzkO7w88WNhzgGk5zC");

  // Récupération du type d'environnement
  $env = getenv('ENVIRONMENT_TYPE');

  try {
    if ($env === "development") {
      $db = new PDO(
        'mysql:host=localhost;dbname=rubiks;charset=utf8',
        'root',
        ''

      );
      // echo "conecté";
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
      // echo "✅ Connexion réussie à la base de données en mode " . getenv('ENVIRONMENT_TYPE') . " !";
    } elseif ($env === "production") {
      $db = new PDO(
        'mysql:host=109.234.164.161;dbname=' . getenv('DB_NAME') . ';charset=utf8',
        getenv('DB_USER'),
        getenv('DB_PASSWORD')
      );
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
      error_reporting(0);
      ini_set('display_errors', 0);
    } else {
      throw new Exception("ENVIRONMENT_TYPE non défini ou invalide.");
    }
  } catch (PDOException $e) {
    if ($env === "development") {
      die("Erreur de connexion : " . $e->getMessage());
    } else {
      error_log("Erreur SQL : " . $e->getMessage(), 3, __DIR__ . "/logs/error.log");
      die("Une erreur est survenue. Veuillez réessayer plus tard.");
    }
  } catch (Exception $e) {
    die("Erreur critique : " . $e->getMessage());
  }
  ?>