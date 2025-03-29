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
  <link rel="icon" type="image/x-icon" href="img/rubiks-cube-145949_1280-1968539853.png">
  <title>Boutique

  </title>
</head>

<body>
  <?php
  include 'navbar.php';
  include 'crud/connexion.php';
  $sql = "SELECT * FROM `stock` ";
  $requette = $db->query($sql);
  $user = $requette->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <div class="wraps" id="presantation">
    <?php
    for ($i = 0; $i <= sizeof($user) - 1; $i++) {

      if ($user[$i]['quantite'] > 0 || $user[$i]['quantite'] != null) {
        // echo $i;

        $img = 0;
        foreach ($user[$i] as $article => $value) {
          // echo $article;
          // echo $value;
          if ($img == 4) {
    ?>
            <div class="card cartes" style="width: 18rem">
              <img src="img/shop/<?php echo $value; ?>
                              " class="card-img-top" alt="..." />
              <div class="card-body">
                <?php
                $res = 1;

                foreach ($user[$i] as $article => $value) {
                ?>
                  <h5 class="card-title"><?php
                                          if ($res == 1) {
                                            echo "nom : " . $value;
                                          } ?></h5>
                  <p>
                  <?php
                  if ($res == 2) {
                    echo "model : " . $value;
                  }
                  if ($res == 3) {
                    echo "prix : " . $value . "€";
                  }
                  if ($res == 4) {
                    echo "quantité : " . $value;
                  }

                  if ($res == 6) {
                    echo "description : " . $value;
                  }
                  $res++;
                }
                  ?>
                  </p>
                  <?php
                  $lg = 0;
                  foreach ($user[$i] as $article => $value) {
                    if ($lg == 1) {
                  ?>
                      <a href="cube.php?ref=<?php
                                            echo $value;
                                            ?>" class="btn btn-outline-dark"> En voir plus </a><?php
                                                                                              }
                                                                                              $lg++;
                                                                                            } ?>
              </div>
            </div>
    <?php
          }
          $img++;
        }
        $lg = 0;
        $res = 0;
      }
    }
    ?>
  </div>
  <?php
  include 'footer.php';
  ?>

</body>

</html>