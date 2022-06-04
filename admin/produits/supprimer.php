<?php

//echo "id prod=".$_GET['idp'];
//recuperation d'id du produit a supprimer
$idp=$_GET['idp'];
//connection avec bd
include "../../inc/functions.php";
$conn=connect();
//requette de suppression
$req="DELETE FROM produits WHERE id='$idp'";
$res=$conn->query($req);
if($res){
    // echo "produit supprimer";
header('location:liste.php?delet=ok');}//envoyer la variable dans l'url pour afficher l'alert

?>