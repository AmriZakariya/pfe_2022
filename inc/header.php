<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">E-SHOP</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Catégories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                  foreach($categories as $cat){
                    print '<li><a class="dropdown-item" href="#">'.$cat['nom'].'</a></li>';
                  }
                  ?>

                </ul>
              </li>
              <?php
              //condition d_ouverture de session(connexion)
              if(isset($_SESSION['nom']))
              {//si connecter afficher seulement profile(vendre)
                print '<li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profile.php">profile</a>
              </li>';}
              else {//si non connecter afficher les deux bouttond de conn et reg
                print'<li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="connexion.php">connexion</a>
                          </li>
                       <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="registre.php">registre</a>
                       </li>';}?>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"><span class="title"> <i class="fas fa-shopping-cart"></i>&nbsp; Panier</span></a>
                </li>

            </ul>
            <form class="d-flex " action="index.php" method="POST">
              <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit" >Search</button>
            </form>
            <?php
            if(isset($_SESSION['nom'])){
              print '<a href="deconnexion.php" class="btn btn-primary">deconnexion</a>';
            }?>
          </div>
        </div>
      </nav>