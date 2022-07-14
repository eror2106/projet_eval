<?php
require('crud/connexion.php');
session_start();


if (isset($_POST['username']) & isset($_POST['password'])) {
  try {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    echo strlen($_POST['username']);
    $sth = $db->prepare("INSERT INTO `users`(`username`, `password`) VALUES (:username, :password)");
    $sth->bindParam(':username', $username);
    $sth->bindParam(':password', $password);
    $sth->execute();
    header('location: login.php');
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
  }
} else {
  echo "";
  // die("veulliez ecrire");
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
  include 'navbar.php'; ?>
  <form action="" method="POST" class="columns centre-element">
    <a>pseudo</a>
    <input type="text" placeolder="Username" name="username"></input>
    <a>mot de passe</a>
    <input type="password" placeolder="Password" name="password"></input>
    <button type="submit">S'inscrire</button>
  </form>
  <?php
  include 'footer.php'; ?>
</body>

</html>