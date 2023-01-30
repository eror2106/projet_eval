<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>supression slider</title>
</head>

<body>
  <?php
  include "../navbar_admin.php";
  include "../connexion.php";
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

    <?php

    $sql = "SELECT * FROM `slider` ";
    $requette = $db->query($sql);

    $user = $requette->fetchAll(PDO::FETCH_ASSOC);
    ?><div class=" d-flex flex-wrap"><?php for ($i = 0; $i <= sizeof($user) - 1; $i++) {

                                    ?>
        <div class="card mx-5" style="width: 18rem;"><?php

                                                      foreach ($user[$i] as $article => $value) {
                                                        if ($article == 'img') { ?>

              <img src="../../img/slider/<?php echo $value; ?>" class="card-img-top" alt="..."><?php }
                                                                                              if ($article == 'text') { ?>
              <div class="card-body">
                <p class="card-text"><?php
                                                                                                echo $value;
                                      ?></p>
              </div>

          <?php
                                                                                              }
                                                                                            } ?>
        </div> <?php
                                    } ?>
    </div>
    <form method="post">
      <div>
        <br>
        <label>nom</label>
        <input type="text" name="nom">
      </div> <br>

      <div>
        <input type="submit" value="valider">
      </div>
    </form>
    </div>
    </div>

  <?php
    $nom = "";


    if (isset($_POST['nom'])) {

      $nom = htmlspecialchars($_POST['nom']);

      $sql = "SELECT `img` FROM `slider`WHERE `text`='$nom'  ";
      $requette = $db->query($sql);
      $user = $requette->fetch(PDO::FETCH_ASSOC);
      $fichier = '../../img/slider/' . $user['img'];
      if (file_exists($fichier)) {
        unlink($fichier);
        $sql = "DELETE FROM `slider` WHERE `text`='$nom'";
        $requete = $db->query($sql);

        echo  "le cube " . $nom . " a bien été suprimer";
        header("refresh:0.2");
      }
    }
  }
  ?>
  </div>

</body>

</html>