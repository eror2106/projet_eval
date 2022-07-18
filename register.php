<?php
require('crud/connexion.php');
session_start();
$pseudo = "";
$err_con = "";
$role = "";
if (!empty($_POST['username'])) {
  $pseudo = htmlspecialchars($_POST['username']);
}
if (isset($_POST["role"])) {

  $role = "user";
}
if (isset($_POST['username']) && isset($_POST['password'])) {
  try {
    $sql = "SELECT * FROM `users` WHERE `username`='$pseudo'";
    $requette = $db->query($sql);
    $user = $requette->fetch(PDO::FETCH_ASSOC);
    if (empty($user)) {
      if ($_POST['password'] == $_POST['confirm_password']) {
        $username = $_POST['username'];
        $password_to_hash = $_POST['password'] . PASS;
        $password = md5($password_to_hash);
        echo strlen($_POST['username']);
        $sth = $db->prepare("INSERT INTO `users`(`username`, `password`,`role`) VALUES (:username, :password,:role)");
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->bindParam(':role', $role);
        $sth->execute();
        header('location: login.php');
      } else {
        $err_con = "les mot de passe corespondent pas";
      }
    } else {
      $err_con = "pseudo déja existant";
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
  <title>Inscription</title>
</head>

<body>
  <?php
  include 'navbar.php';
  if (!empty($err_con)) {
  ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <p class="text-center"><?php echo $err_con; ?></p> .
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php } ?>
  <form action="" method="POST" class="columns centre-element">
    <a>pseudo</a>
    <input type="text" placeolder="Username" name="username"></input>
    <a>mot de passe</a>
    <input type="password" placeolder="Password" name="password"></input>
    <a>confirmer le mot de passe</a>
    <input type="password" placeolder="Password" name="confirm_password"></input>

    <button type="submit">S'inscrire</button>
  </form>
  <?php
  include 'footer.php'; ?>
</body>

</html>