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
  include 'connexion.php';



  $sql = "DELETE FROM `stock` WHERE `id`='1'";
  $requete = $db->query($sql);
  echo  "il y a " . $requete->rowCount() . "ligne qui a été suprimer";
  ?>



</body>

</html>