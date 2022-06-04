<?php
session_start();
//si la session est ouverte on peut pas y acceder a cette page!
if(isset($_SESSION['nom']))
{//header('location:profile.php');
}

include "../inc/functions.php";//il faut sortir du dossier admin;
$categories = getAllcategories();
$user=true;
if(!empty($_POST)){ //login_button
  $user = ConnectAdmin($_POST);
  //si les coordonnees sont vraies alors le tableau va contenir au moins une lingne;
  if(is_array($user) && $user>0) //on test même si la avariable est un array
  {//redirection vers la page profile;
   //ouvrir une session
   session_start();
   $_SESSION['id']=$user['id'];
   $_SESSION['email']=$user['email'];
   $_SESSION['nom']=$user['nom'];
   $_SESSION['mp']=$user['mp'];
    header('location:profile.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.css">
  </head>
<body>
<!--fin_nav-->
<!--formulaire-->
<div class="col-12 p-5">
    <h1 class="text-center">Espace Admin</h1>
  <form action="login.php" method="post">
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
      <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">connexion</button>
  </form>
</div>  
<!--footer-->
<?php include "../inc/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.all.min.js"></script><!--js_alert-->
<?php
if(!$user){ //afficher lorsque la conx est echouéé
  print "<script>
        Swal.fire({
        title: 'Erreur',
        text: 'Cordonnees non valides',
        icon: 'error',
        confirmButtonText: 'Ok',
      timer: 2000} )
      </script>";
}
?>
</html>