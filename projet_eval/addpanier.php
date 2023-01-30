<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
include 'crud/connexion.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $produit = "SELECT * FROM `stock` WHERE `id`=$id ";
    $requette = $db->query($produit);
    $modele = $requette->fetch(PDO::FETCH_ASSOC);
    if (empty($modele)) {
        die('le produit nexiste pas');
    }
    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id] += 1;

        echo "produit  similaire ajoutée";
    } else {
        $_SESSION['panier'][$id] = 1;
        echo "produit ajouter";
    }
    header('location: shop.php');
}
