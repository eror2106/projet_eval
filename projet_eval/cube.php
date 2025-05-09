<?php
session_start();

if (!isset($_SESSION['role'])) {
  $_SESSION['role'] = array();
}
$ref = $_GET['ref'];
?>

<!DOCTYPE html>
<html lang="en">

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/x-icon" href="img/rubiks-cube-145949_1280-1968539853.png">

  <title>Document</title>
</head>

<body>
  <?php
  include 'navbar.php';
  include 'crud/connexion.php';


  $sql = "SELECT * FROM `stock`WHERE `model`='$ref'";
  $requette = $db->query($sql);


  $user = $requette->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="rows">
    <div class="cube">

      <img src="img/shop/<?php echo $user['image'] ?>" alt="" />
    </div>
    <div class="columns explication">

      <h1><?php

          echo $user['nom'];
          ?>
      </h1>
      <p><?php

          echo $user['prix'] . " €";

          ?>
      </p>
      <p><?php

          echo $user['model'];

          ?></p>
      <p><?php

          echo $user['description'];
          ?></p>
      <?php

      include '/crud/crud_user/con_user.php';


      if ('user' === $_SESSION['role']) { ?>
        <button><a class="add" href="addpanier.php?id=<?= $user['id'] ?>">ajouter au panier</a></button>
      <?php }
      if ('admin' === $_SESSION['role']) { ?>
        <button><a class="add" href="addpanier.php?id=<?= $user['id'] ?>">ajouter au panier</a></button>
      <?php }
      if ('admin' != $_SESSION['role'] && 'user' != $_SESSION['role'] || empty($_SESSION['role'])) { ?>
        <button><a class="add" href="login.php">ajouter au panier</a></button>
      <?php
      }
      ?>
    </div>

  </div>
  <?php
  include 'footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>