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
  ?>
  <div class="wraps" id="presantation">
    <div class="card cartes" style="width: 18rem">
      <img src="img/packs/packs_debutant.jpg" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Nos packs débutant</h5>
        <p>
          vous souhaitez apprendre a résoudre le puzzle le plus connu au monde
          cliquez ci-dessous on vous aide
        </p>
        <a href="pack_debutant.php" class="btn btn-outline-dark"> packs débutant</a>
      </div>
    </div>
    <div class="card cartes" style="width: 18rem">
      <img src="img/packs/pack_intermediaire.jpg" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Nos packs intermediaire</h5>
        <p>
          vous avez un nivau pour résoudre le rubikscube et vous shouaitez
          ameliorer vos temps
        </p>
        <a href="pack_intermediaire.php" class="btn btn-outline-dark"> packs intermediaire</a>
      </div>
    </div>
    <div class="card cartes" style="width: 18rem">
      <img src="img/packs/pack_expert.jpg" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title">Nos packs expert</h5>
        <p>
          vous avez résolver le rubikscube en moins de 10 seconde ? vous
          shouaitez ameliorer vos temps on vous montre des rubiks cube regler
          pour vos besoin
        </p>
        <a href="pack_expert.php" class="btn btn-outline-dark">packs expert</a>
      </div>
    </div>
    <div class="card cartes" id="accessoire" style="width: 18rem">
      <img src="img/carousel-slider-3423608208.png" class="card-img-top" alt="..." />
      <div class="card-body">
        <h5 class="card-title"></h5>

        <a href="#" class="btn btn-outline-dark"> accessoire</a>
      </div>
    </div>
    <div class="card cartes" style="width: 18rem">
      <img src="img/carousel-slider-3423608208.png" class="card-img-top" alt="..." />
      <div class="card-body">
        <a href="shop.php" class="btn btn-outline-dark">shop</a>
      </div>
    </div>
  </div>

  <?php
  include 'footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>