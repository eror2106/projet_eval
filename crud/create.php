<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  include "connexion.php";
  $sql = "INSERT INTO `stock`( `nom`, `model`, `prix`, `images`, `description`) 
  VALUES ('value-2','value-3','4','value-5','value-6')";
  $requete = $db->query($sql);

  ?>
</body>

</html>