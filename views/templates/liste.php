    <?php 
    include "header.php";
    $unique_cat=[];
    $erreur_categorie="";
    $msg_val="";
    $data=new DataLayer();
    $prods=new ProductManager($data->getConnection());
    $prod=$prods->getAll();
    $cat=$prods->getCategory();
    
    if(isset($_GET['cat'])){

    $unique_cat=$prods->getCat(htmlspecialchars($_GET['cat']));
      if($unique_cat==null){
        $erreur_categorie="Categorie non disponible !";
      }
    }else{
      $unique_cat=$prods->getAll();
    }

    if(isset($_GET['v'])){
    $msg_val="Commande effectuee avec succes!";
    }

    ?>

    <div class="container-fluid" id="pageList">
        <div class="row">
            <div class="pageList--banner">
                <div class="filigrane">
              <h2>Placez Vos Commandes</h2>
    </div>
            </div>
        </div>
      </div>

      <div class="container py-5 text-center">
                        <div class="row">
                          <h4 class="<?php if($msg_val!=null){echo "alert alert-success";}?>"><?php if($msg_val!=null){echo $msg_val;}?></h4>
                        <div class="col-md-12 d-flex justify-content-between">
                            <span> Nos Produits</span>
                            <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Categories
      </a>

      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <li><a class="dropdown-item" href="liste">Tout</a></li>
        <?php
          foreach($cat as $c){
        ?>
        <li><a class="dropdown-item" href="liste?cat=<?=$c['category']?>"><?=$c['category']?></a></li>
        <?php } ?>
      </ul>
    </div>
                       
                        </div>
                        <hr my-4>
                        <?php
                           if($erreur_categorie!=null){
                             echo"<p class='alert-danger p-4'>$erreur_categorie</p>";
                           }
                        ?>  
                      <?php
                        foreach($unique_cat as $p)
                        {
                      ?>
                        <div class="col-12 col-lg-4 col-md-12">
                        <div class="card my-3" >
                        <img src="images/any/<?=$p->image()?>" class="card-img-top d-block " alt="image accueil" height="250px;">
                        <div class="card-body">
                        <p class="card-text"><strong><?=$p->name()?></strong><br/><br/><span>$ <?=$p->price()?></span></p>
                          <a href="detail?id=<?=$p->id()?>" class="btn">Details</a>
                          <a href="" class="btn">Commander</a>
                        </div>
                        </div>
                        </div>
                        <?php } ?>
                        <br/>
                      
                        </div>
                </div>


    <?php 
    include "footer.php";
    ?>