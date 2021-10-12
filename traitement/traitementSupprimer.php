<?php
include "../BDD/BDD_connection.php";
include "../BDD/function.php";
$ville_nom = $_GET['id'];

Supp($db,$ville_nom);

header('location: ../index.php');
?>