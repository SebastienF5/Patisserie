<?php 
    include "header.php";
    $unique_prod;
    $erreur_id="";
    $panier=array();
    $check=false;
    $msg_succes="";
    $data=new DataLayer();
    $prods=new ProductManager($data->getConnection());
    $produitsFor=$prods->getListFor();
   
    if(isset($_GET['id'])){

    $unique_prod=$prods->detailProduct((htmlspecialchars($_GET['id'])));

      if($unique_prod==null){
        $erreur_id="Non Disponible !";
      }
    
    }

    if(isset($_POST['ajouter'])){
    
       $paniers[]=$unique_prod;
       $_SESSION["panier"][]=$paniers[0];
    
      $nb=count($_SESSION["panier"]);
      if(is_numeric($_POST['nb']))
      {
        $unique_prod->setQte($_POST['nb']);
      }
      $msg_succes=" Produit Ajouté";
    }

    ?>
    
    <div class="container">
        <div class="row">
     
  
            <div class="col-lg-6 col-md-12 p-4">
                  
            <?php
              if($msg_succes!=null){
                echo "<h1 class='col-md-6'>$msg_succes</h1>";
              }
            ?>
                <img src="images/any/<?=$unique_prod->image()?>" class="col-md-12 img-thumbnail shadow-lg" >
                
            </div>
            <div class="col-12 col-md-12 col-lg-6 p-4 form-detail">
                <h3><?=$unique_prod->name()?></h3>
                <p><?=$unique_prod->description()?></p>
                <span> Categorie : <?=$unique_prod->category()?></span><br/>
                <strong>$ <?=$unique_prod->price()?></strong>
                
                <form method="post" action="">
                <input type="text" name="nb" class="col-md-2" placeholder="Qte" required>
                 <br/> <input type="submit" name="ajouter" value="Ajouter" class="btn btn-ajouter col-md-12 my-4">
                </form>
                <!--<a href="panier" class="btn btn-ajouter col-md-12 my-4"> Ajouter </a>-->
                <a href="liste" class="btn btn-retour col-md-12"> Retour sur page Produits </a>
            </div>
            <?php
                     foreach($produitsFor as $p)
                     {
                   ?>
                    <div class="col-12 col-lg-4 col-md-12 my-3 text-center">
                    <div class="card" >
                    <a href="detail?id=<?=$p->id()?>"><img src="images/any/<?=$p->image()?>" class="card-img-top img-rounded" alt="image accueil" height="250"></a>
                   
                    </div>
                    </div>
                    <?php } ?>
        </div>
    </div>


    <?php 
    include "footer.php";
    ?>