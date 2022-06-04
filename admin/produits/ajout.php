<?php
session_start();
//recuperation des donnees du formulaire
$nom=$_POST['nom'];
$desc=$_POST['description'];
$prix=$_POST['prix'];
$createur=$_POST['createur'];
$cat=$_POST['categorie'];
//upload image
$target_dir = "../../images/"; //l'emplacement ou l'image va etre poster
$target_file = $target_dir . basename($_FILES["image"]["name"]);//new place+name
//upload du fichier vers son emplacement
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { //tmp_name=nom temporaire d'image
    $image=$_FILES["image"]["name"]; //name=le nom d'image
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
$date_creat=date("y-m-d");
//la connection avec la bd
include "../../inc/functions.php";
$conn=connect();
//requette et execution
try{
    //la requette d'ajout
    $req="INSERT INTO produits (nom,description,prix,image,categorie,createur,date_creation) 
    VALUES('$nom','$desc','$prix','$image','$cat','$createur','$date_creat')";
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