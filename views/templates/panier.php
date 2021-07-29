<?php 

include "header.php";
$total=0;
$error="";

if(isset($_POST['valider'])){
  if($_SESSION['username']!=null){
    header("location:validerPanier");
  }else{
    header("location:login?c=0");
  }
}

?>

 <div class="container-fluid p-5 text-center">
    <div class="row">
      <h3> Cher Client, voici le contenu de votre panier ! </h3>
   <div class="table-responsive-sm">
      <table class="table  my-3">
  <thead class="table-dark">
    <th scope="col">ID</th>
    <th  scope="col">Nom</th>
    <th  scope="col">Description</th>
    <th  scope="col">Image</th>
    <th  scope="col">Prix</th>
    <th  scope="col">Quantite</th>
    <th  scope="col">Action</th>
  </thead>
  <tbody>
    <?php
   
      if(isset($_SESSION["panier"])){
       foreach($_SESSION["panier"] as $key=>$p){
         $total=$total + ($p->price() * $p->qte());
    ?>
     <tr>
     <td><?=$p->id()?></td>
     <td><?=$p->name()?></td>
     <td><?=$p->description()?></td>
     <td><img src="images/any/<?=$p->image()?>" width="50" height="40"></td>
     <td><?=$p->price()?></td>
     <td><?php if($p->qte()!=null){echo $p->qte();}else{echo "1";}?></td>
     <td><a href="delete?id=<?=$key?>">Supprimer</a></td>
       </tr>
     <?php } }?>
    <tr>
      <td colspan="4"><strong>Total : $ <?=$total?></strong></td>
    </tr>
  </tbody>
</table>
       </div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-success <?php if(empty($_SESSION["panier"])){echo "disabled";}?>" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="fas fa-shopping-cart"></i> Valider
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Commande</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Souhaitez-vous valider le panier?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
        <form method="post" action="">
         <input type="submit" class="btn btn-primary" value="valider" name="valider">
       </form>
      </div>
    </div>
  </div>
</div>

    </div>
 </div>
<?php include "footer.php" ?>