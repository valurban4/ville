<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=villes_france;charset=utf8", "root", "");
} catch (Exception $e) {
    die($e->getMessage());
}


?>