<?php
require 'crud/connexion.php';
include 'crud/crud user/con_user.php';
session_start();

$err_de_con = "";
$pseudo = "";
$mdp = "";

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
  if (isset($_POST['username'])) {
    $pseudo = htmlspecialchars($_POST['username']);
  }
  if (isset($_POST['password'])) {
    $mdp = htmlspecialchars($_POST['password']);
  }

  $sth = $db->prepare("SELECT * FROM users WHERE `username`='$pseudo' ");
  $sth->execute();

  $row = $sth->fetch(PDO::FETCH_ASSOC);

  if (!empty($row)) {
    if (md5($mdp . PASS) == $row['password']) {
      if (!isset($_SESSION['role'])) {
        $_SESSION['role'] = array();
        $_SESSION['role'] = $row['role'];
      } else {
        $_SESSION['role'] = $row['role'];
      }
      header('Location: index.php');
    } else {
      $err_de_con = "mdp inconue";
    }
  } else {
    $err_de_con = "pseudo inconue";
  }
  include 'footer.php'; ?>
</body>

</html>