<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supression produits</title>
</head>

<body>
  <?php
  include "../navbar_admin.php";
  include '../connexion.php';
  $ref = $_GET['id'];
  // session_start();
  $_SESSION['role'] = array();
  $_SESSION['role'] = $ref;

  $verif = $db->prepare("SELECT `role` FROM `users` WHERE `id`='$ref' ");
  $verif->execute();

  $secur = $verif->fetch(PDO::FETCH_ASSOC);
  if ($secur['role'] != 'admin') {
    die("pas bien");
  } else { ?>
    <br><br>
    <div class="mx-5 d-flex flex-wrap">

      <?php

      $sql = "SELECT * FROM `stock` ";
      $requette = $db->query($sql);


      $user = $requette->fetchAll(PDO::FETCH_ASSOC);

      for ($i = 0; $i <= sizeof($user) - 1; $i++) {
      ?>

        <?php

        $img = 0;
        foreach ($user[$i] as $article => $value) {
          if ($img == 4) {



        ?>
            <div class="card cartes mx-2" style="width: 18rem">
              <img src="../../img/shop/<?php echo $value; ?>
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

              </div>
            </div>


      <?php
          }
          $img++;
        }

        $res = 0;
      } ?>
    </div>


    <form method="post">
      <div class="mx-5">
        <br>
        <label>nom</label>
        <input type="text" name="nom">
      </div> <br>

      <div class="mx-5">
        <input type="submit" value="valider">
      </div>
    </form>
    </div>
    </div>

    </div><?php
          $nom = "";


          if (isset($_POST['nom'])) {

            $nom = htmlspecialchars($_POST['nom']);

            $sql = "SELECT `images` FROM `stock`WHERE `nom`='$nom' ";
            $requette = $db->query($sql);
            $user = $requette->fetch(PDO::FETCH_ASSOC);
            $fichier = '../../img/shop/' . $user['images'];
            if (file_exists($fichier)) {
              unlink($fichier);
              $sql = "DELETE FROM `stock` WHERE `nom`='$nom'";
              $requete = $db->query($sql);
              header("location: delete.php");
            }
          }
        }
          ?>
</body>

</html>