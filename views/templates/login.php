<?php include "header.php";
$data=new DataLayer();
$customer=new CustomerManager($data->getConnection());
$pseudo=$password="";
$succes=true;
$msg="";
$error_pseudo=$error_password="";

$msg_valider="";
if(isset($_GET['c'])){
  $msg_valider="Connectez vous afin d'effectuer la commande";
}

if(isset($_POST["envoyer"]))
{
  $pseudo=htmlspecialchars($_POST['pseudo']);
  $password=htmlspecialchars($_POST['password']);

  if(empty($pseudo)){
    $error_pseudo="Votre pseudo";
    $succes=false;
  }

  
  if(empty($password)){
    $error_password="Votre password";
    $succes=false;
  }

  if($succes){
    $check=$customer->identification($pseudo,$password);
     if($check==true){
       $_SESSION['username']=$pseudo;
       header("location:accueil");
     }else{
       $msg="Verifier le couple email/password";
     }
  }




}

?>
<div class="container">
 <div class="row">
<div class="col-md-6">
    <img src="images/any/hello.webp" class="col-12">
</div>

<div class="col-md-6 p-5 text-center">
<div id="" class="form-text <?php if($msg_valider!=null){echo "alert alert-danger";}?>"><?php if($msg_valider!=null){echo $msg_valider;}?></div>
<div id="" class="form-text <?php if($msg!=null){echo "alert alert-danger";}?>"><?php if($msg!=null){echo $msg;}?></div>
<form method="post" action="">
  <div class="mb-3 text-left">
    <label for="exampleInputpseudo1" class="form-label">Pseudo</label>
    <input type="text" class="form-control" id="exampleInputpseudo1" aria-describedby="pseudoHelp" name="pseudo">
    <div id="pseudoHelp" class="form-text e-danger"><?php if($error_pseudo!=null){echo $error_pseudo;}?></div>
  </div>
  <div class="mb-3 ">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
    <div id="passwordHelp" class="form-text e-danger"><?php if($error_password!=null){echo $error_password;}?></div>
  </div>

  <input type="submit" class="btn btn-marron pull-right" name="envoyer">
</form>
</div>
</div>
</div>
<?php include "footer.php";?>