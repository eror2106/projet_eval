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

  <?php
  include "../navbar_admin.php";
  require '../connexion.php';

  $sth = $db->prepare("SELECT * FROM users ");
  $sth->bindParam(':username', $_POST['username']);
  $sth->execute();

  $row = $sth->fetchAll(PDO::FETCH_ASSOC);

  ?><div class=" d-flex flex-wraps">
    <?php for ($i = 0; $i <= sizeof($row) - 1; $i++) {
    ?>

      <div class="card mx-5 mt-5" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">pseudo : <?php echo $row[$i]['username']; ?></h5>
          <h6 class="card-subtitle mb-2 ">role : <?php echo $row[$i]['role']; ?></h6>
          <form method="post">

          </form>

        </div>
      </div>
    <?php

    }
    ?>
  </div>

</body>

</html>