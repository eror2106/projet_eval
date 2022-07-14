<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <title>Document</title>
</head>

<body>
  <div class="container col-md-5 col-md-offset-3">
    <div class="panel panel-info">
      <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">nom</label>
            <input type="text" name="nom" class="form-control-file">
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">model</label>
            <input type="text" name="model" class="form-control-file">
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">prix</label>
            <input type="text" name="prix" class="form-control-file">
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">photo</label>
            <input type="file" name="photo" class="form-control-file">

          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <textarea type="text" name="Description" class="form-control-file" rows="4" cols="50"> </textarea>
          </div>
          <div>
            <input type="submit" name="submit" value="valider">
          </div>
        </form>
      </div>
    </div>
    <?php
    $nom = "";
    $model = "";
    $prix = "";
    $photo = "";
    $Description = "";

    if (isset($_POST['nom'])) {
      $nom = htmlspecialchars($_POST['nom']);
    }

    if (isset($_POST['model'])) {

      $model = htmlspecialchars($_POST['model']);
    }

    if (isset($_POST['prix'])) {
      $prix = (int)htmlspecialchars($_POST['prix']);
    }

    if (isset($_POST['photo'])) {
      $photo = htmlspecialchars($_POST['photo']);
    }
    if (isset($_POST['Description'])) {
      $Description = htmlspecialchars($_POST['Description']);
    }

    if (isset($_POST['submit'])) {

      $maxsize = 100000;
      $valid_ext = array('.jpg', '.jpeg', '.gif', '.png');
      if ($_FILES['photo']['error'] > 0) {
        echo "erreur de transfert";
        die;
      }
      $file_size = $_FILES['photo']['size'];
      if ($file_size > $maxsize) {
        echo "lefichier est trop gros";
        die;
      }
      $file_name = $_FILES['photo']['name'];
      $file_ext = "." . strtolower(substr(strrchr($file_name, '.'), 1));

      if (!in_array($file_ext, $valid_ext)) {
        echo "le fichier n'est pas compatible";
        die;
      }

      $tmpName = $_FILES['photo']['tmp_name'];
      $uniqueid = md5(uniqid(rand(), true));
      $file_name = "../img/shop" . $uniqueid . $file_ext;
      $resultat = move_uploaded_file($tmpName, $file_name);
      include 'connexion.php';

      $sql = $db->prepare("INSERT INTO `stock`( `nom`, `model`, `prix`, `images`, `description`) VALUES ('$nom','$model','$prix','$uniqueid','$Description')");
      $envoie = $sql->execute();
      if ($resultat) {
        echo "cube crée";
      }
    }




    ?>
</body>
</div>


</html>