<?php

//echo "id cat=".$_GET['idc'];
//recuperation d'id du categorie a supprimer
$idcat=$_GET['idc'];
//connection avec bd
include "../../inc/functions.php";
$conn=connect();
//requette de suppression
$req="DELETE FROM categories WHERE id='$idcat'";
$res=$conn->query($req);
if($res){
    // echo "categorie supprimer";
header('location:liste.php?delet=ok');}//envoyer la variable dans l'url pour afficher l'alert

?>