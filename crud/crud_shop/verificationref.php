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
  <?php include '../navbar_admin.php'; ?>
  <div class="container col-md-5 col-md-offset-3">
    <div class="panel panel-info">
      <div class="panel-body">
        <form method="post">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">nom</label>
            <input type="text" name="nom" class="form-control-file">
          </div>

          <div>
            <input type="submit" value="valider">
          </div>
        </form>
      </div>
    </div>
    <?php
    include '../connexion.php';
    $nom = "";


    if (empty($_POST['nom'])) {
      echo "il manque le nom";
      die();
    } else {
      $nom = htmlspecialchars($_POST['nom']);

      $sql = $db->prepare("SELECT * FROM `stock` WHERE `nom`='$nom'");
      $sql->execute();
      $envoie = $sql->fetchAll();
      if (empty($envoie)) {
        echo "le nom n'existe pas";
        die();
      } else {
        echo "le nom " . $nom . " existe voulez vous modifier ce produit";
        header("location: mise_a_jour.php?nom=$nom");
      }
    }
    ?>
  </div>
</body>

</html>