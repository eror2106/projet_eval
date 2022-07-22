<?php
require 'crud/connexion.php';
include 'crud/crud_user/con_user.php';
session_start();
if (isset($_POST["role"])) {

  $role = "user";
}

$err_de_con = "";
$pseudo = "";
$mdp = "";
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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style/styles.css" />
<link rel="stylesheet" href="style/footer.css">
<link rel="stylesheet" href="style/cubes.css">
<link rel="stylesheet" href="style/nospack.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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