<?php
require('crud/connexion.php');
include 'crud/crud user/con_user.php';
session_start();

$err_de_con = "";
if (isset($_POST['username']) && isset($_POST['password'])) {
  try {
    if ($row == false) {
      $err_de_con = "Mauvais mot de passe ou username.";
    } else {
      $password_to_hash = $_POST['password'] . PASS;
      $password = md5($password_to_hash);
      $hash = $row['password'];
      if ($password === $hash) {
        $_SESSION['id']   = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = array();
        $_SESSION['role'] = $row['role'];
        header('Location: index.php');
      } else {
        $err_de_con = "Mauvais mot de passe incorecte.";
      }
    }
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
  }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php
  include "head.php";
  ?>
  <title>Connexion</title>
</head><?php
        include 'navbar.php'; ?>

<body>
  <?php if (!empty($err_de_con)) {
  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p class="text-center"><?php
                              echo $err_de_con;
                              ?></p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
  }




  ?>
  <form action="" method="POST" class="columns centre-element">
    <a>pseudo</a>
    <input type="text" placeolder="Username" name="username"></input>
    <a>mot de passe</a>
    <input type="password" placeolder="Password" name="password"></input>
    <button type="submit">Connexion</button>
  </form>
  <?php
  include 'footer.php'; ?>
</body>

</html>