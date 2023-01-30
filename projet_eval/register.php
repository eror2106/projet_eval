<?php
require('crud/connexion.php');
session_start();
$pseudo = "";
$err_con = "";

if (!empty($_POST['username'])) {
  $pseudo = htmlspecialchars($_POST['username']);
}

if (isset($_POST['debutant'])) {
  $niveaux = 'debutant';
}


if (isset($_POST['inter'])) {
  $niveaux = 'inter';
}

if (isset($_POST['exp'])) {
  $niveaux = 'exp';
}

$role = "user";

if (isset($_POST['username']) && isset($_POST['password'])) {
  try {
    $sql = "SELECT * FROM `users` WHERE `username`='$pseudo'";
    $requette = $db->query($sql);
    $user = $requette->fetch(PDO::FETCH_ASSOC);
    if (empty($user)) {
      if ($_POST['password'] == $_POST['confirm_password']) {
        $username = htmlspecialchars($_POST['username']);
        $password_to_hash = $_POST['password'] . PASS;
        $password = md5($password_to_hash);
        $sth = $db->prepare("INSERT INTO `users`(`username`, `password`,`role`,`niveaux`) VALUES (:username, :password,:role,:niveaux)");
        $sth->bindParam(':username', $username);
        $sth->bindParam(':password', $password);
        $sth->bindParam(':role', $role);
        $sth->bindParam(':niveaux', $niveaux);
        $sth->execute();
        var_dump($sth);
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
  <link rel="icon" type="image/x-icon" href="img/rubiks-cube-145949_1280-1968539853.png">
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
  <form action="" method="POST" class="columns py-5 my-5 centre-element">
    <label>pseudo</label>
    <input type="text" placeolder="Username" name="username"></input>
    <label>mot de passe</label>
    <input type="password" placeolder="Password" name="password"></input>
    <label>confirmer le mot de passe</label>
    <input type="password" placeolder="Password" name="confirm_password"></input>
    <br>
    <div class="d-flex flex-row">
      <input type="checkbox" id="vehicle1" name="debutant" value="debutant">
      <label for="vehicle1"> vous resolver votre cube jusqua 45 s</label><br>
    </div>
    <div class="d-flex flex-row">
      <input type="checkbox" id="vehicle2" name="inter" value="inter">
      <label for="vehicle2"> vous resolver votre cube jusqua 30 s</label><br>
    </div>
    <div class="d-flex flex-row">
      <input type="checkbox" id="vehicle3" name="exp" value="exp">
      <label for="vehicle3"> vous resolver votre cube jusqua 10 s</label><br><br>
    </div>
    <button type="submit" class="my-5 text-white">S'inscrire</button>
  </form>
  <?php
  include 'footer.php'; ?>
</body>

</html>