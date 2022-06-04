<?php
include "inc/functions.php";
//selection des categ
$categories = getAllcategories();
//recuperer l'id envoyer par index.php du produit selectionner
if(isset($_GET['id']))
{
    $prod=getproduitByid($_GET['id']);
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
</head>
<body>
  <!--nav-->
  <?php include "inc/header.php";
  ?>
   
      <!--afficher les details d'un produit-->
<div class="row col-12 mt-4">
    <div class="card col-8 offset-2">
          <img src="images/<?php echo $prod['image'];?>" class="card-img-top" alt="artizanat">
       <div class="card-body">
          <h5 class="card-title"><?php echo $prod['nom']?></h5>
          <p class="card-text"><?php echo $prod['description']?></p>
       </div>
         <ul class="list-group list-group-flush">
             <li class="list-group-item"><?php echo $prod['prix']?>&nbsp MAD</li>
             <?php
             foreach($categories as $key => $value){
                 if($value['id']== $prod['categorie'])
                 {
                     print'<li class="list-group-item">'. $value['nom'].'</li>';
                 }
             }?>
        </ul>

    </div>
</div><!--div principale des produits-->
<!--footer-->
<?php include "inc/footer.php";?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>