<?php
session_start();
//recuperation des donnees du formulaire
$nom=$_POST['nom'];
$description=$_POST['description'];
$createur=$_SESSION['id'];
$date_creat=date("y-m-d"); //2022-06-03-
//la connection avec la bd
include "../../inc/functions.php";
$conn=connect();
try{
//la requette d'ajout
$req="INSERT INTO categories (nom,description,createur,date_creation) 
VALUES('$nom','$description','$createur','$date_creat')";
//execution de la requette
$res=$conn->query($req);
//verification
if($res){
    header('location:liste.php?ajout=ok');//evoyer la variable ajout dans l'url
}
}catch(PDOException $e){
    //echo "insertion failed:".$e->getMessage();//affiche l'erreur n°23000;
    if($e->getcode()==23000){
        //echo "Ce nom existe deja!";
        header('location:liste.php?erreur=duplicate');
    }
}



?>