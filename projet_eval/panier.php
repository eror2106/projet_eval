<?php
if (!isset($_SESSION)) {
  session_start();
}
include 'crud/connexion.php';
if (isset($_GET['del'])) {
  $id_del = $_GET['del'];
  unset($_SESSION['panier'][$id_del]);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/styles.css" />
  <link rel="stylesheet" href="style/panier.css" />
  <link rel="stylesheet" href="style/footer.css" />
  <link rel="stylesheet" href="style/nospack.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="icon" type="image/x-icon" href="img/rubiks-cube-145949_1280-1968539853.png">
  <title>panier</title>
</head>

<body>
  <?php
  include 'navbar.php';
  $total = 0;
  $empty_pan = "";
  ?>
  <section class="my-5">
    <table>
      <tr>
        <th>Nom</th>
        <th>Model</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Action</th>
      </tr>
      <?php
      if (empty($_SESSION['panier']) || $_SESSION['panier'] == null) {
        $empty_pan = 'panier vide'; ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong><?php echo $empty_pan; ?></strong> Remplisier votre panier pour effectuer un achat.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div><?php
            } else {
              $ids = array_keys($_SESSION['panier']);
              for ($i = 0; $i <= sizeof($ids) - 1; $i++) {
                if (empty($ids)) {
                  die();
                } else {
                  $produit = "SELECT * FROM `stock` WHERE `id`=$ids[$i]";
                  $requette = $db->query($produit);
                  $modele = $requette->fetch(PDO::FETCH_ASSOC);
              ?>
            <tr>
              <td><strong><?php echo $modele['nom']; ?></strong></td>
              <td><?php echo $modele['model']; ?></td>
              <td><?php echo $modele['prix'] . " €"; ?></td>
              <td><?php echo $_SESSION['panier'][$ids[$i]]; ?></td>
              <td> <a href="panier.php?del=<?= $modele['id'] ?>"><i class="fa-solid fa-trash-can"></i></a> </td>
              <?php $total += $modele['prix']; ?>
            </tr>
      <?php
                }
              }
            }
      ?>
    </table>
  </section>
  <br> <br>
  <p>prix total : <?php echo $total; ?> €</p>

  <button class="achat my-5">passez à l'achat</button>
  <?php
  include 'footer.php';
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>