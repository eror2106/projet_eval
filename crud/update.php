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
  $sql = "UPDATE `stock` SET `nom`='value-2',`model`='value-3',`prix`='4',`images`='value-5',`description`='value-6' WHERE `id`=1";
  $requete = $db->query($sql);
  var_dump($requete);
  ?>
</body>

</html>