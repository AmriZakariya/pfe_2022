<?php
session_start();
include "inc/functions.php";
//selection des categ
$categories = getAllcategories();
//search button
if(!empty($_POST['search'])){
  $produits = searchproduit($_POST['search']);
}
else{
//selection de tous prods
$produits = getAllproducts();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <!--nav-->
  <?php include "inc/header.php";?>
   
      <!--affichage des produits-->
<div class="row col-12 mt-4">
  <?php
  foreach($produits as $prod){
    print ' <div class="col-3 mt-4">
    <!--card1-->
    <div class="card" style="width: 18rem;">
        <img src="images/'.$prod['image'].'" class="card-img-top" alt="artizanat"> <!--sourcedimage-->
        <div class="card-body">
          <h5 class="card-title">'.$prod['nom'].'</h5>
          <p class="card-text">'.$prod['description'].'</p>
          
          <a href="produit.php?id='.$prod['id'].'" class="btn btn-primary">Afficher</a>
        </div>
      </div>
</div>';
  }
  ?>
   


</div><!--div principale des produits-->
<!--footer-->
<?php include "inc/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>