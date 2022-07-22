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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Nos packs</title>
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
        <h5 class="card-title">Nos packs 	intermédiaire</h5>
        <p>
          vous avez un nivau pour résoudre le rubikscube et vous shouaitez
          ameliorer vos temps
        </p>
        <a href="pack_intermediaire.php" class="btn btn-outline-dark"> packs 	intermédiaire</a>
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
  </div>

  <?php
  include 'footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>