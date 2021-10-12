<?php


function getAll($db) {
    $sql = 'SELECT  * FROM villes_france_free LIMIT 100' ;
    $req_getall = $db->prepare($sql);
    $result_getall = $req_getall->execute();
    $data = $req_getall->fetchAll(PDO::FETCH_OBJ);
    foreach( $data as $value) { 
       echo '<tr class="table-active">';
       echo '<th scope="row">'.htmlspecialchars($value->ville_nom).'</th>';
       echo '<td>'.htmlspecialchars($value->ville_departement).'</td>';
       echo '<td>'.htmlspecialchars($value->ville_population_2010).'</td>';
       echo '<td><a class="btn btn-primary" href="http://127.0.0.1/villes/visioner.php?id='.htmlspecialchars($value->ville_id).'" role="button">Visioner</a><a class="btn btn-primary" href="traitement/traitementSupprimer.php?id='.htmlspecialchars($value->ville_id).'" role="button" id="red" >supprimer</a></td>';
       echo '</tr>';
       
    }
    
}

function Supp($db, $ville_id) {
    $sql_supp = 'DELETE FROM villes_france_free  WHERE ville_id = :ville_id';
    $req_supp= $db->prepare($sql_supp);
    $result_supp = $req_supp->execute([
            ":ville_id"=>$ville_id]);
}


function vision($db, $ville_id) {
    $sql = 'SELECT * FROM `villes_france_free` WHERE `ville_id` = :ville_id';
    $req_vision = $db->prepare($sql);
    $result_vision = $req_vision->execute([
        ":ville_id"=>$ville_id]);
    $data = $req_vision->fetchAll(PDO::FETCH_OBJ);
    foreach( $data as $value) {
        echo '<tr class="table-active">';
       echo '<th scope="row">'.htmlspecialchars($value->ville_nom).'</th>';
       echo '<td>'.htmlspecialchars($value->ville_departement).'</td>';
       echo '<td>'.htmlspecialchars($value->ville_population_2010).'</td>';
       echo '<td>'.htmlspecialchars($value->ville_commune).'</td>';
       echo '<td>'.htmlspecialchars($value->ville_code_postal).'</td>';
       echo '<td><a class="btn btn-primary" href="traitement/traitementSupprimer.php?id='.htmlspecialchars($value->ville_id).'" role="button" id="red" >supprimer</a></td>';
       echo '</tr>';
}
}

function select($db, $recherche) {
    $sql = 'SELECT  * FROM villes_france_free LIMIT 100' ;
    $req_select = $db->prepare($sql);
    $result_select = $req_select->execute();
    $data = $req_select->fetchAll(PDO::FETCH_OBJ);
    foreach( $data as $value) {
       if($recherche == $value->ville_nom) {
           header('location: http://127.0.0.1/villes/visioner.php?id='.htmlspecialchars($value->ville_id));
       }
       
    }
}
?>