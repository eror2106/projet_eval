<?php
$nom = $_GET['nom']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <title>mise a jour </title>
</head>

<body>
  <?php
  include '../connexion.php';
  $sql = "SELECT * FROM `stock` ";
  $requette = $db->query($sql);


  $user = $requette->fetch(PDO::FETCH_ASSOC);


  ?>
  <div class="container col-md-5 col-md-offset-3">
    <div class="panel panel-info">
      <div class="panel-body">
        <form method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">model</label>
            <input type="text" name="model" class="form-control-file" value="<?php echo $user['model']; ?>">
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">prix</label>
            <input type="text" name="prix" class="form-control-file" value="<?php echo $user['prix']; ?>">
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">photo</label>
            <input type="file" name="photo" class="form-control-file" value="<?php echo $user['images']; ?>">
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <textarea type="text" name="Description" class="form-control-file" rows="4" cols="50"><?php echo $user['description']; ?> </textarea>
          </div>
          <div>

            <div>
              <input type="submit" value="valider">
            </div>
        </form>
      </div>
    </div>
    <?php

    $model = "";
    $prix = "";
    $photo = "";
    $Description = "";



    if (empty($_POST['model'])) {

      die();
    } else {

      $model = htmlspecialchars($_POST['model']);
    }

    if (empty($_POST['prix'])) {
      die();
    } else {
      $prix = (int)htmlspecialchars($_POST['prix']);
    }

    if (empty($_POST['photo'])) {

      die();
    } else {
      $photo = htmlspecialchars($_POST['photo']);
    }

    if (empty($_POST['Description'])) {

      die();
    } else {
      $Description = htmlspecialchars($_POST['Description']);
    }
    $sql = "UPDATE `stock` SET `model`='$model',`prix`='$prix',`images`='$photo',`description`='$Description' WHERE `nom`='$nom'";
    $requete = $db->query($sql);
    if ($requete == true) {
      header("Refresh:0.0");
    }
    ?>
  </div>
</body>

</html>