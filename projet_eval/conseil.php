<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/styles.css" />
  <link rel="stylesheet" href="style/footer.css">
  <link rel="stylesheet" href="style/cubes.css">
  <link rel="stylesheet" href="style/nospack.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/x-icon" href="img/rubiks-cube-145949_1280-1968539853.png">
  <title>Conseil</title>
</head>

<body>
  <?php
  session_start();
  $role =       $_SESSION['niveaux'];
  if (empty($_SESSION['niveaux'])) {
    $role = 'debutant';
  }

  include 'navbar.php';
  include 'crud/connexion.php';
  $sql = "SELECT * FROM `users` INNER JOIN `conseil` WHERE    conseil.niveaux='$role' AND users.niveaux='$role'  ORDER BY RAND() LIMIT 1";
  $requette = $db->query($sql);
  $user = $requette->fetchAll(PDO::FETCH_ASSOC);

  foreach ($user as $article => $value) {
  }
  ?>


  <div class=" py-5">
    <div class=" ms-1  mb-1 fs-4 wraps text-center py-5" id="presantation">
      <p><?php echo $value['text'] . "&ensp; "; ?></p>




      <a target="_blank" id="nostyle" href="<?php echo $value['lien']; ?>"><?php echo $value['nom_lien']; ?></a>








    </div>
  </div>
  <br>
  <?php
  include 'footer.php';
  ?>

</body>

</html>