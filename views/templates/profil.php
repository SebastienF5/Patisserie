<?php
include "header.php";

if(!isset($_SESSION["username"]))
{
   header("location:login");
}else{
$error_password=$error_email=$error_pseudo=$error_img=$error_nom=$error_prenom=$error_tel="";
$msg="";
$username=$email=$p=$tel=$sexe=$fn=$ln="";
$userInfo="";
$succes=true;
//stockage des infos du user
 $data=new DataLayer();
 $user=new CustomerManager($data->getConnection());
 $userInfo=$user->getUserbyUsername($_SESSION['username']);

 if(isset($_POST['envoyer'])){
    $username=htmlspecialchars($_POST['pseudo']);
    $email=htmlspecialchars($_POST['email']);
    $fn=$_POST['prenom'];
    $ln=$_POST['nom'];
    $sexe=$_POST['sexe'];
    $tel=$_POST['tel'];



if(isset($_FILES['photo']) and $_FILES['photo']['error']==0)
{
  
 if($_FILES['photo']['size']<=1000000){
   $infofichier=pathinfo($_FILES['photo']['name']);
   $extension_upload=$infofichier['extension'];
   $extension_autorise=array('jpg','jpeg','png','gif');
   if(in_array($extension_upload,$extension_autorise)){
    
       $file=''.time().''.$username.'.'.$extension_upload;
          move_uploaded_file($_FILES['photo']['tmp_name'],'src/uploads/'.$file);
          $img=$file;
   }
 }else{echo "error"; $succes=false;}
}
else{
    $succes=false;
    print_r($_FILES);
    echo "error"; 
    $img="default.jpg";
}

 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $error_email="* email incorrect!";
     $succes=false;
 }



if(empty($username)){
    $error_pseudo="* Entrez votre username";
    $succes=false;
}

if(empty($email)){
 $error_email="* Entrez votre email";
 $succes=false;
 $emailfalse=true;
}


if($succes){


$n=$user->updateUser(
  new Customer
  ([
   'id'=>$userInfo['id'],
  'pseudo'=>$username,
  'firstname'=>$fn,
  'lastname'=>$ln,
  'sexe'=>$sexe,
  'email'=>$email,
  'password'=>null,
  'tel'=>$tel,
  'image'=>$img
  ])
);

$msg="Enregistrer Avec Succes";
header("Location:profil");
}
 }
}
?>
<div class="container" id="pageProfil">
    <div class="row">
        <div class="col-12 col-xs-12 col-md-12 col-lg-12 header-profil text-center p-5 mb-3">
            <h4>Bienvenue , <strong><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?></strong></h4>
        </div>
        <div class="col-12 col-xs-12 col-md-12 col-lg-7 shadow-lg p-2">
        <form method="post" action="" enctype="multipart/form-data">
    
        <div class="mb-3 text-left">
            <label for="exampleInputspeudo" class="form-label">pseudo</label>
            <input type="text" class="form-control" name="pseudo" value="<?=$userInfo['pseudo']?>">
            <div id="pseudoHelp" class="form-text e-danger"><?php if($error_pseudo!=null){echo $error_pseudo;}?></div>
        </div>
        <div class="mb-3 text-left">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="<?=$userInfo['email']?>" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text e-danger"><?php if($error_email!=null){echo $error_email;}?></div>
        </div>
        <div class="mb-3 ">
            <label for="exampleInputfirstname" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="exampleInputPassword1"name="prenom" value="<?=$userInfo['firstname']?>">
            <div id="prenomHelp" class="form-text e-danger"><?php if($error_password!=null){echo $error_prenom;}?></div>
        </div>
        <div class="mb-3">
        <label for="exampleInputname" class="form-label">nom</label>
            <input type="text" class="form-control" id="exampleInputnom" name="nom" value="<?=$userInfo['lastname']?>">
            <div id="nomHelp" class="form-text e-danger"><?php if($error_password!=null){echo $error_nom;}?></div>
        </div>
        <div class="mb-3 ">
        <label for="exampleInputsexe" class="form-label">   </label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sexe">
            <option >Sexe</option>
            <option value="masculin" <?php if($userInfo['sexe']=="masculin"){ echo "selected";} ?>>Feminin</option>
            <option value="Feminin"  <?php if($userInfo['sexe']=="feminin"){ echo "selected";} ?>>Masculin</option>
            <option value="Autre"    <?php if($userInfo['sexe']=="autre"){ echo "selected";} ?>>Autre</option>
        </select>
        </div>
        <div class="mb-4">
        <label for="exampleInputTel" class="form-label">Tel</label>
            <input type="text" class="form-control" id="exampleInputTel" name="tel" value="<?=$userInfo['tel']?>">
            <div id="nomHelp" class="form-text e-danger"><?php if($error_password!=null){echo $error_tel;}?></div>
        </div>
        <div class="mb-3">
        <label for="exampleInputfile" class="form-label">   </label>
            <input type="FILE" class="form-control" name="photo">
            <div id="FileHelp" class="form-text"><?php if($error_img!=null){echo $error_image;}?></div>
        </div>
        <input type="submit" class="btn btn-marron pull-right" name="envoyer" value="Modifier">
</form>
        </div>
        
        <div class="col-12 col-xs-12 col-md-12 col-lg-4 p-2 shadow-sm block-3 text-center">
             <p><img src="uploads/<?=$userInfo['image']?>" class="col-4 col-xs-4 col-md-4 col-lg-4 rounded-circle shadow-lg img-profil"></p>
             <strong><?=$userInfo['pseudo']?></strong>
             <p><?=$userInfo['firstname']?> <strong><?=$userInfo['lastname']?></strong></p>
             <a href="" class="btn btn-marron col-6 col-md-6 col-lg-6">Historique D'achat</a><br/><br/>
             <a href="logout" class="col-4 col-md-4 col-lg-4 my-2 btn btn-danger"> Deconnexion</a>
        </div>

        </div>


</div>
</div>
<?php
    include "footer.php";
?>