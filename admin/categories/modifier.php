<?php
session_start();
//recuperation des donnees du formulaire
$id= $_POST['idc'];
$nom=$_POST['nom'];
$description=$_POST['description'];
$date_mod=date("y-m-d"); //2022-06-03-
//la connection avec la bd
include "../../inc/functions.php";
$conn=connect();
//la requette d'ajout
$req="UPDATE categories 
SET nom='$nom',description='$description',date_modification='$date_mod' WHERE id='$id'";
//execution de la requette
$res=$conn->query($req);
//verification
if($res){
    header('location:liste.php?modif=ok');//evoyer la variable modif dans l'url pour afficher l'alerte
}




?>