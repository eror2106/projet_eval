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
  $role = "admin";
} else {
  $role = "user";
}


// SELECT * FROM `users` WHERE `username`='dodo'
if (isset($_POST['username']) && isset($_POST['password'])) {
  try {

    $sql = "SELECT * FROM `users` WHERE `username`='$pseudo'";
    $requette = $db->query($sql);


    $user = $requette->fetch(PDO::FETCH_ASSOC);


    if (empty($user)) {

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/styles.css" />
  <link rel="stylesheet" href="style/footer.css" />
  <title>Inscription</title>
</head>

<body>
  <?php
  include 'navbar.php';
  echo $err_con;
  // 
  ?>
  <form action="" method="POST" class="columns centre-element">
    <a>pseudo</a>
    <input type="text" placeolder="Username" name="username"></input>
    <a>mot de passe</a>
    <input type="password" placeolder="Password" name="password"></input>
    <div class="d-flex flex-row">
      <input type="checkbox" name="role" value="role">
      <label for="">veux tu devenir administrateur du site</label>
    </div>

    <button type="submit">S'inscrire</button>
  </form>
  <?php
  include 'footer.php'; ?>
</body>

</html>