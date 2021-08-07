<?php
  session_start();
  $data=new DataLayer();
 $user=new CustomerManager($data->getConnection());
 if(isset($_SESSION['username']))
 {
    $userInfo=$user->getUserbyUsername($_SESSION['username']);
 }

?>
<div class="container-fluid text-center bg-header">
        <div class="row">
            <div class="col-12 col-xs 12col-sm-12 col-md-12 col-lg-2 ">
                <ul class="list-inline p-4">
                    <li class="list-inline-item"><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li  class="list-inline-item"><a href=""><i class="fab fa-instagram-square"></i></a></li>
                    <li  class="list-inline-item"><a href=""><i class="fab fa-twitter-square"></i></a></li>
                </ul>
            </div>

            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <img src="images/logo/logo.png">
            </div>

            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <p class="p-4 call">
                 <span>Call Us: +509 2813 15 15 </span>
                </p>
            </div>
        </div>

        <!-- Menu -->
        <div class="bg-header">
        <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <!--<a class="navbar-brand" href="#">Navbar</a>-->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="liste">Produits</a>
        </li>
       <!--- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>-->
        <li class="nav-item">
          <a class="nav-link" href="about" tabindex="-1" >A propos</a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="contact" tabindex="-1" >Contact</a>
        </li>
         
      </ul>
       <div class="profil col-md-6 text-center">
   
      <p style="<?php if(!isset($userInfo)){echo "display:none !important";} ?>"><a href='profil'><img src="uploads/<?=$userInfo['image']?>" class=" rounded-circle p-2 shadow-sm" style="height:60px; width:10%"></a></p>
             
       </div>
    <div class="header-link">

            <ul class="list-inline menu-header">
   <li class="list-inline-item">
   <a href="panier" class="btn btn-marron position-relative">
  Panier
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    <?php if(isset($_SESSION["panier"])){echo count($_SESSION["panier"]);} else{echo "0";}?>
    <span class="visually-hidden">unread messages</span>
  </span>
</a>
   </li>
                <li class="list-inline-item">| </li>
                <li class="list-inline-item"><a href="login">Login</a></li>
                <li class="list-inline-item"><a href="signup">Sign up</a></li>
            </ul>
    </div>

    </div>
    </div>
    </div>
</nav>
</div>
        <!-- end-->


    </div>