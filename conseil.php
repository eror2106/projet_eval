<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include "head.php";
  ?>
  <title>Document</title>
</head>

<body>
  <?php
  include 'navbar.php';
  include 'crud/connexion.php';
  $sql = "SELECT * FROM `conseil` ORDER BY RAND() LIMIT 1";
  $requette = $db->query($sql);
  $user = $requette->fetchAll(PDO::FETCH_ASSOC);

  foreach ($user as $article => $value) {
  }
  ?>
  <div class="wraps text-center" id="presantation">
    <p><?php echo $value['text']; ?></p>




    <a target="_blank" href="<?php echo $value['lien']; ?>"><?php echo $value['nom_lien']; ?></a>





    <!-- <iframe src=" https://youtu.be/FKLyQvc4QrM" height="400" width="900"></iframe> -->

  </div>
  <?php
  include 'footer.php';
  ?>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
</body>

</html>