<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/styles.css" />
  <link rel="stylesheet" href="style/footer.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>Acceuil</title>
</head>

<body>
  <?php
  include 'navbar.php';
  include 'crud/connexion.php';

  $sql = 'SELECT `img`FROM `slider` ';
  $requette = $db->query($sql);

  $images = $requette->fetchAll(PDO::FETCH_ASSOC);


  ?>
  <div class="slider"><?php
                      $img = 0;
                      foreach ($images as $image) {
                      ?>
      <img class="image_slider active" src="img/slider/<?php echo $image['img']; ?>" alt="" />
    <?php
                        $img++;
                      }

    ?>
    <div class="suivant">
      <i class="fa-solid fa-angle-right"></i>
    </div>
    <div class="precedent">
      <i class="fa-solid fa-angle-left"></i>
    </div>
  </div>


  <div class="wraps presantation">
    <div class="card" style="width: 18rem;">
      <img src="img/rubiks-cube-145949_1280-1968539853.png" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text text-center">Cube</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="img/rubiks-cube-145949_1280-1968539853.png" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text text-center">accessoires</p>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="img/rubiks-cube-145949_1280-1968539853.png" class="card-img-top" alt="...">
      <div class="card-body">
        <p class="card-text text-center">tuto</p>
      </div>
    </div>
    <img src="img/carousel-slider-3423608208.png" alt="" />
  </div>
  <?php
  include 'footer.php';
  ?>
  <script src="script/mains .js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>