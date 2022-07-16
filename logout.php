<?php
session_start();
$_SESSION['panier'] = array();
$_SESSION['role'] = array();
if (empty($_SESSION['panier'])) {
  header("location: login.php");
}
