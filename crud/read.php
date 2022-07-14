<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <!-- read -->
  <?php
  include 'connexion.php';
  $sql = "SELECT * FROM `stock` ";
  $requette = $db->query($sql);


  $user = $requette->fetch(PDO::FETCH_ASSOC);

  var_dump($user['nom']);

  ?>
</body>

</html>