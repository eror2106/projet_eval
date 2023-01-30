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
  <title>Connexion</title>
</head>

<body>
  <?php
  if (!isset($_SESSION)) {
    session_start();
    if (!isset($_SESSION['id'])) {
      $_SESSION['id'] = array();
    }
  }
  include 'navbar.php'; ?>
  <?php
  include 'crud/connexion.php';
  include 'crud/crud_user/con_user.php';

  if (isset($_POST["role"])) {

    $role = "user";
  } ?>
  <div class="my-5">
    <br>
    <form action="" method="POST" class="columns my-5 py-5 centre-element">
      <label>pseudo</label>
      <input type="text" placeolder="Username" name="username"></input>
      <label>mot de passe</label>
      <input type="password" placeolder="Password" name="password"></input>
      <button type="submit" class="my-5 text-white">Connexion</button>
    </form>
  </div>
  <?php



  $err_de_con = "";
  $pseudo = "";
  $mdp = "";
  if (isset($_POST['username'])) {
    $pseudo = htmlspecialchars($_POST['username']);
  }
  if (isset($_POST['password'])) {
    $mdp = htmlspecialchars($_POST['password']);
  }

  $sth = $db->prepare("SELECT * FROM `users`WHERE `username`='$pseudo'  ");
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
      if (!isset($_SESSION['niveaux'])) {
        $_SESSION['niveaux'] = array();
        $_SESSION['niveaux'] = $row['niveaux'];
      } else {
        $_SESSION['niveaux'] = $row['niveaux'];
      }
      $_SESSION['id'] = $row['id'];
      header('Location: index.php');
    }
  }
  ?><?php
    include 'footer.php'; ?>
</body>

</html>