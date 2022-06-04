<?php
session_start();
//recuperation des donnees du formulaire
$id= $_POST['idp'];
$nom=$_POST['nom'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$cat=$_POST['categorie'];
$date_mod=date("y-m-d"); //2022-06-03-
//la connection avec la bd
include "../../inc/functions.php";
$conn=connect();
//la requette d'ajout
$req="UPDATE produits 
SET nom='$nom',description='$description',prix='$prix',
categorie='$cat',date_modification='$date_mod' WHERE id='$id'";
//execution de la requette
$res=$conn->query($req);
//verification
if($res){
    header('location:liste.php?modif=ok');//evoyer la variable modif dans l'url pour afficher l'alerte
}




?>