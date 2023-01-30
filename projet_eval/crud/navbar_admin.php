<?php
session_start();
?><nav class="navbar navbar-expand-lg navbar-dark      bg-dark">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link text-white active" aria-current="page" href="../crud_shop/ajout.php?id=<?= $_SESSION['id'] ?>">ajout</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white" href="../crud_shop/verificationref.php?id=<?= $_SESSION['id'] ?>">maj</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-white" href="../crud_shop/delete.php?id=<?= $_SESSION['id'] ?>">Delete</a>
        </li>



        <li class="nav-item ">
          <a class="nav-link text-white active" aria-current="page" href="../crud_slider/ajout.php?id=<?= $_SESSION['id'] ?>">ajout slider</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-white" href="../crud_slider/delete.php?id=<?= $_SESSION['id'] ?>">Delete slider</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-white" href="../crud_user/utilisateurs.php?id=<?= $_SESSION['id'] ?>">utilisateurs</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-white" href="../../logout.php">appliquer et me déconecter</a>
        </li>



      </ul>
      <span class="navbar-text">

      </span>
    </div>
  </div>
</nav>