<?php
include '../BDD/BDD_connection.php';
include '../BDD/function.php';
$recherche = $_POST['search'];
$rechercheMaj = strtoupper($recherche);
select($db, $rechercheMaj);
?>