<?php
if (!isset($_SESSION)) {
  session_start();
}  ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="d-flex justify-content-around ">
    <div class="container-fluid">

      <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a href="index.php  "><img id="logomenu" src="img/rubiks-cube-145949_1280-1968539853.png" alt="" /></a></li>
          </ul>

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
              <a class="nav-link">conseil astuce</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class=" d-flex flex-row ">
      <ul class=" navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-row">
        <li class="nav-item">
          <a class="nav-link mx-5" href="panier.php"><i class="fa-solid fa-cart-shopping"></i><span><?= array_sum($_SESSION['panier']) ?></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-5" href="login.php">login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">register</a>
        </li>
      </ul>
    </div>
  </div>

</nav>