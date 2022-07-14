<?php
require('crud/connexion.php');
session_start();


if (isset($_POST['username']) & isset($_POST['password'])) {
  try {
    $sth = $db->prepare("SELECT * FROM users WHERE username=:username");
    $sth->bindParam(':username', $_POST['username']);
    $sth->execute();

    $row = $sth->fetch(PDO::FETCH_ASSOC);
    var_dump($row);
    $hash = $row['password'];
    var_dump($hash);
    if (password_verify($_POST['password'], $hash)) {
      $_SESSION['id']   = $row['id'];
      $_SESSION['username'] = $row['username'];
      header('Location: index.php');
    } else {
      echo "Mauvais mot de passe our username.";
    }
  } catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
  }
} else {
  echo "";
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
  <title>Connexion</title>
</head><?php
        include 'navbar.php'; ?>

<body>
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