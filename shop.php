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
  $sql = "SELECT * FROM `stock` ";
  $requette = $db->query($sql);
  $user = $requette->fetchAll(PDO::FETCH_ASSOC);
  ?>
  <div class="wraps" id="presantation">
    <?php
    for ($i = 0; $i <= sizeof($user) - 1; $i++) {
      
      if ($user[$i]['quantite'] > 0 || $user[$i]['quantite'] != null) {


        $img = 0;
        foreach ($user[$i] as $article => $value) {
          if ($img == 4) {
    ?>
            <div class="card cartes" style="width: 18rem">
              <img src="img/shop/<?php echo $value; ?>
                              " class="card-img-top" alt="..." />
              <div class="card-body">
                <?php
                $res = 0;
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
                  if ($res == 5) {
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>