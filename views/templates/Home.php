<?php 
include "header.php";

$data=new DataLayer();
$prods=new ProductManager($data->getConnection());
$prod=$prods->getList();

$produitsFor=$prods->getListFor();

?>
<div class="container-fluid" id="hero-main">
            <div class="row">
                <div class="col-md-12 hero home-cake">
                    <p>Healthy made <br/>delicious cake</p>
                    <a class="btn col-md-4" href="liste">Order Now</a>
                </div>
            </div>
        </div>
        <div class="container p-4 home-info">
                <div class="row">
                <div class="col-md-12 text-center">
                    <h1>This is Marie Belliard<br/>  Lorem ipsum dolor sit<br/>  eat buger</h1>
                    <hr class="my-4">
                </div>
                 <div class="col-md-6">
                 <h5>This is Marie Belliard<br/>  Lorem ipsum dolor sit<br/>  eat buger</h5>
                 <p>
                 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis nesciunt omnis, 
                 ullam maiores ex fugiat obcaecati, nobis odio doloremque sit 
                 voluptate eius quis pariatur cum sint qui error consectetur placeat!
                 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis nesciunt omnis, 
                 ullam maiores ex fugiat obcaecati, nobis odio doloremque sit 
                 voluptate eius quis pariatur cum sint qui error consectetur placeat!<br/><br/>

                 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis nesciunt omnis, 
                 ullam maiores ex fugiat obcaecati, nobis odio doloremque sit 
                 voluptate eius quis pariatur cum sint qui error consectetur placeat!
                 </p> 
                 </div>

                 <div class="col-12 col-md-6">
                    <img src="images/Gateaux/roulades.jpg" class="img-thumbnail col-12 col-md-12">
                 </div>
                </div>

                <div class="container py-5 text-center">
                    <div class="row">
                   <?php
                     foreach($prod as $p)
                     {
                   ?>
                    <div class="col-12 col-lg-4 col-md-12">
                    <div class="card my-4" >
                    <img src="images/any/<?=$p->image()?>" class="card-img-top" alt="image accueil">
                    <div class="card-body">
                     <p class="card-text"><strong><?=$p->name()?></strong><br/><br/><span>$ <?=$p->price()?></span></p>
                      <a href="detail?id=<?=$p->id()?>" class="btn">Details</a>
                      <a href="" class="btn">Commander</a>
                     </div>
                    </div>
                    </div>
                    <?php } ?>
                    <br/>
                    <div class="col-md-12 text-center p-5 list-link">
                        <a href="liste" class="btn-marron">Voir Plus</a>
                    </div>
                    </div>
                </div>
              
                <div class="container-fluid d-flex">
                    <div class="row">
                        <div class="col-12 col-md-12 d-flex justify-content-between">
                            <h3>Nos Blogs</h3>
                            <a href="" class="btn btn-default">More Blog </a>
                        </div>
                        <div class="col-12 col-md-6 p-4">
                            <img src="images/Gateaux/pizza.jpg" class="col-12 col-md-12 shadow-lg" alt="image blog"><br/>
                            <h5 class="p-2"> Lorem ipsum dolor sit amet<br/> consectetur adipisicing elit</h5>
                            <p class="">
                            
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore id nisi recusandae 
                          corrupti quaerat quidem, distinctio, minus aliquam vitae, 
                          blanditiis eius provident reiciendis est. Pariatur illum quam porro commodi magni.
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore id nisi recusandae 
                          corrupti quaerat quidem, distinctio, minus aliquam vitae, 
                          blanditiis eius provident reiciendis est. Pariatur illum quam porro commodi magni.
                     </p>
                         <a href="" class="my-link" > Apprendre plus</a>
                        </div>
                   
                        <div class="col-12 col-md-6 p-4">
                            <img src="images/Gateaux/bg4.jpg"  class="col-12 col-md-12 shadow-lg" alt="image blog"/>
                            <h5 class="p-2"> Lorem ipsum dolor sit amet <br/>consectetur adipisicing elit</h5>
                            <p class="">  
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore id nisi recusandae 
                          corrupti quaerat quidem, distinctio, minus aliquam vitae, 
                          blanditiis eius provident reiciendis est. Pariatur illum quam porro commodi magni.
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore id nisi recusandae 
                          corrupti quaerat quidem, distinctio, minus aliquam vitae, 
                          blanditiis eius provident reiciendis est. Pariatur illum quam porro commodi magni.
                        </p>
                        <a href="" class="my-link"> Apprendre plus</a>
                        </div>
                        
                        <div class="col-12 col-md-12 text-center p-4">
                            <h4 >Fallow Us On Instagram</h4>
                            <a href="" class="my-link btn-marron p-3"><i class="fab fa-instagram-square" style="color:white!important;"></i> Marie Belliard</a>
                        </div>
                    </div>
                </div>

                <div class="container py-5 text-center">
                    <div class="row">
                   <?php
                     foreach($produitsFor as $p)
                     {
                   ?>
                    <div class="col-md-4">
                    <div class="card my-3" >
                    <a href="detail?id=<?=$p->id()?>"><img src="images/any/<?=$p->image()?>" class="card-img-top  img-rounded" alt="image accueil" height="250"></a>
                     <span class="bg-light p-3 shaddow-lg" >$ <?=$p->price()?></span>
                    </div>
                    </div>
                    <?php } ?>
                    </div>
                </div>
                     </div>
                <?php 
            include "footer.php";
      ?>

         