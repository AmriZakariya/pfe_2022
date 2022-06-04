<?php
session_start();
include "../../inc/functions.php" ;//cat->admin->inc->funct
$categories = getAllcategories();
$produits= getAllproducts();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard_Administrateur</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../../css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../../deconnexion.php">Déconnexion</a>
    </div>
  </div>
</header>
<!--sidebar componnents-->
<div class="container-fluid">
  <div class="row">
<!--inclusion du navbar from template-->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#">
              <span data-feather="home"></span>
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../categories/liste.php">
              <span data-feather="file"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="shopping-cart"></span>
              Produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Utilisateurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Rapports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../profile.php">
              <span data-feather="layers"></span>
              Profile
            </a>
          </li>
        </ul>
      </div>
    </nav>
<!--le fond de la page-->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Liste des produits</h1>
        <div>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
        </div>
      </div>
              <!--liste des produits-->
              <div>
  <!--affichage d'une alerte de succes:ajout-->
  <?php
               if(isset($_GET['ajout']) && $_GET['ajout']=="ok"){
                 print '<div class="alert alert-success"> Ajout avec succes</div>';
               }
               
               ?>
<!--affichage d'une alerte de succes:suppression-->
                <?php
               if(isset($_GET['delet']) && $_GET['delet']=="ok"){
                 print '<div class="alert alert-success"> Suppression avec succes</div>';
               }
               
               ?>
<!--affichage d'une alerte de succes:modification-->
              <?php
               if(isset($_GET['modif']) && $_GET['modif']=="ok"){
                 print '<div class="alert alert-success"> Modification avec succes</div>';
               }
               
               ?>
<!--affichage d'une alerte d'erreur:ajout du nom existant-->
              <?php
               if(isset($_GET['erreur']) && $_GET['erreur']=="duplicate"){
                 print '<div class="alert alert-danger" > Produit existe deja!</div>';
               }
               
               ?>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">image</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      <!--on va boucler le tableau $produits-->
      <?php
  $i=0;
  foreach($produits as $index =>$p){
      $i++;
  print '    <tr>
  <th scope="row">'.$i.'</th> <!--pour afficher le rank-->
  <td> <img src="../../images/'.$p['image'].' " class="card-img-top" alt="artizanat" width="100" height="100"></td>
  <td>'.$p['nom'].'</td>
  <td>'.$p['description'].'</td>
  <td>
      <a data-bs-toggle="modal" data-bs-target="#editModal'.$p['id'].'" class="btn btn-success">Modifier</a> <!--btn vert-->
      <a href="supprimer.php?idp='.$p['id'].'" class="btn btn-danger">Supprimer</a> <!--btn rouge-->
  </td>
</tr>';
  }
      ?>
  </tbody>
</table>
        </div>
        <!--fin de liste-->
    </main>
  </div>
</div>
<!-- Modal:pop_up:ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--form d'ajout-->
        <form action="ajout.php" method="post" enctype="multipart/form-data">
            <!--nom prd-->
            <div>
                 <input type="text" name="nom" class="form-control" placeholder="nom de produit..." required >
            </div>
            <!--description prod-->
            <div class="mt-4">
                 <textarea  name="description" class="form-control" placeholder="description de produit..." required></textarea>
            </div>
            <!--prix prd-->
            <div class="mt-4">
                 <input type="number" name="prix"  class="form-control" placeholder="prix..." required >
            </div>
        <!--image prd-->
           <div class="mt-4">
                 <input type="file" name="image"  class="form-control"  required >
            </div>

 <!--cat prd-->
            <div class="mt-4">
                 <select  name="categorie" class="form-control" required >
                     <?php
                     foreach($categories as $index =>$cat){
                         print '<option value="'.$cat['id'].'">'.$cat['nom'].'</option>';
                     }?>
                 </select>
            </div>
 <!--createur prd-->
<input type="hidden" value="<?php echo $_SESSION['id']?>" name="createur">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- chaque modal est associee a une categorie -->
<?php
foreach($produits as $index=>$prod){?>
<!-- Modal:pop_up:modification -->
<div class="modal fade" id="editModal<?php echo $prod['id']; //test?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier produit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--form modification-->
        <form action="modifier.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idp" value="<?php  echo $prod['id'];?>">
            <!--nom cat-->
            <div>
                 <input type="text" name="nom" class="form-control" value="<?php echo $prod['nom'] ;?>"> <!--nom_vlaue from db-->
            </div>
            <!--description cat-->
            <div class="mt-4">
                 <textarea  name="description" class="form-control" ><?php echo $prod['description']; ?></textarea><!--descp_vlaue from db-->
            </div>
            <!--prix prd-->
                        <div class="mt-4">
                 <input type="number" name="prix"  class="form-control" value="<?php echo $prod['prix'] ;?>" required >
            </div>
             <!--cat prd-->
             <div class="mt-4">
                 <select  name="categorie" class="form-control" value="<?php echo $prod['prix'] ;?>" required >
                     <?php
                     foreach($categories as $index =>$cat){
                         print '<option value="'.$cat['id'].'">'.$cat['nom'].'</option>';
                     }?>
                 </select>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<!--scripts-->
    <script src="../../js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
      <script src="../../js/dashboard.js"></script>
  </body>
</html>
