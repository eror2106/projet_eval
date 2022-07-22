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
  <?php
  include "head.php";
  ?>

  <title>Document</title>
</head>

<body>
  <?php
  include 'navbar.php';
  include 'crud/connexion.php';


  $sql = "SELECT * FROM `stock`WHERE `nom`='$ref'";
  $requette = $db->query($sql);


  $user = $requette->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="rows">
    <div class="cube">

      <img src="img/shop/<?php echo $user['images'] ?>" alt="" />
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
      include 'crud/crud_user/con_user.php';



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