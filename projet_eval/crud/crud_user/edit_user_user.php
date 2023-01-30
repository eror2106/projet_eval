<?php require '../connexion.php';


$ref = $_GET['ref'];



$sql = " UPDATE `users` SET `role`='user' WHERE `id`='$ref'";
$requete = $db->query($sql);
var_dump($requete);

if ($requete == true) {
  header("location: utilisateurs.php");
}
