<?php
session_start();
//tester la connexion avant d'acceder au profil
if(!isset($_SESSION['nom']))
{header('location:connexion.php');}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
      <!--nav-->
  <?php include "inc/header.php";?>
  <!--div contenant les infos_user et deconnexion_button-->
  <div class="container">
    <h1>Bienvenu <span class="text-primary"><?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></span></h1>
   </div>
   <!--footer-->
   <?php include "inc/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>