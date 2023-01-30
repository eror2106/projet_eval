<?php
if (!isset($_SESSION)) {
  session_start();
  if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = array();
  }
}  ?>

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
            <a class="nav-link text-white" href="../crud_shop/delete.php?id=<?= $_SESSION['id'] ?>">stock</a>
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