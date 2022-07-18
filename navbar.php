<?php
if (!isset($_SESSION)) {
  session_start();
  if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = array();
  }
}  ?>
<link rel="stylesheet" href="style/styles.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid  d-flex flex-row ">

    <div class="d-flex flex-row">
      <a class="navbar-brand" href="index.php "><img id="logomenu" src="img/rubiks-cube-145949_1280-1968539853.png" alt="" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="nospack.php">nos Pack</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">shop</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="conseil.php">conseil astuce</a>
        </li>
      </ul>
    </div>

    <div class="  d-flex flex-row ">
      <ul class=" navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row">
        <li class="nav-item">
          <a class="nav-link mx-5" href="panier.php"><i class="fa-solid fa-cart-shopping"></i><span><?php
                                                                                                    // var_dump($_SESSION['panier']);
                                                                                                    if (empty($_SESSION['panier'])) {
                                                                                                      echo "0";
                                                                                                    } else {
                                                                                                      $quantite = array_sum($_SESSION['panier']);
                                                                                                      echo strval($quantite);
                                                                                                    }
                                                                                                    ?></span></a>
        </li>
        <?php
        if (empty($_SESSION['role'])) { ?>
          <li class="nav-item">
            <a class="nav-link mx-5" href="login.php">login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">register</a>
          </li>
        <?php } ?>
        <?php
        if ($_SESSION['role'] == 'admin') { ?>
          <li class="nav-item">
            <a class="nav-link" href="crud/crud shop/ajout.php">stock</a>
          </li>
        <?php } ?>
        <?php

        if ($_SESSION['role'] == "user" || $_SESSION['role'] == "admin") { ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php ">logout </a>
          </li>
        <?php } ?>

      </ul>
    </div>
  </div>

</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />