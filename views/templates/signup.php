<?php

$error_password=$error_email=$error_pseudo=$error_img="";
$msg="";
$username=$email=$pass=$cpass="";
$password=$cp="";

$tabNom=array();

$emailfalse=false;
$succes=true;
$samePseudo=false;
$img="";
$data=new DataLayer();
$customer=new CustomerManager($data->getConnection());

if(isset($_POST['envoyer'])){
    $username=htmlspecialchars($_POST['pseudo']);
    $email=htmlspecialchars($_POST['email']);
    $password=htmlspecialchars($_POST['password']);
    $cp=htmlspecialchars($_POST['confirm_password']);

if(isset($_FILES['photo']) and $_FILES['photo']['error']==0)
{
  
 if($_FILES['photo']['size']<=1000000){
   $infofichier=pathinfo($_FILES['photo']['name']);
   $extension_upload=$infofichier['extension'];
   $extension_autorise=array('jpg','jpeg','png','gif');
   if(in_array($extension_upload,$extension_autorise)){
    
       $file=''.time().''.$username.'.'.$extension_upload;
          move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/'.$file);
          $img=$file;
   }
 }else{echo "error";}
}
else{
 $img="default.jpg";
}
 
 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     $error_email="* email incorrect!";
     $succes=false;
 }

 if($password!=$cp){
     $error_password="Les mots de passe sont differents!";
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
if(empty($password)){
 $error_password="* Entrez votre password";
 $succes=false;
}

if($succes){


$customer->insertUser(
  new Customer
  ([
  
  'pseudo'=>$username,
  'firstname'=>"",
  'lastname'=>"",
  'sexe'=>"",
  'email'=>$email,
  'password'=>$password,
  'tel'=>"",
  'image'=>$img
  ])
);

$msg="Enregistrer Avec Succes";
}

}
?>

<div class="container" id="signup">
    <div class="row">
    <div class="col-md-5 p-5 text-center">
        <img src="images/any/sign.png" class="col-12">
        <a href="login" class="compte">J'ai un compte</a>
        </div>
        <div class="col-md-7 p-3">
         <h1>S'inscrire</h1>
    <form method="post" action="">
    
    <div class="mb-3 text-left">
    <label for="exampleInputspeudo" class="form-label">pseudo</label>
    <input type="text" class="form-control" name="pseudo">
    <div id="pseudoHelp" class="form-text e-danger"><?php if($error_pseudo!=null){echo $error_pseudo;}?></div>
  </div>
<div class="mb-3 text-left">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text e-danger"><?php if($error_email!=null){echo $error_email;}?></div>
  </div>
  <div class="mb-3 ">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1"name="password">
    <div id="passwordHelp" class="form-text e-danger"><?php if($error_password!=null){echo $error_password;}?></div>
  </div>
  <div class="mb-4">
    <label for="exampleInputPassword1" class="form-label">Confirmer Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="confirm_password">
  </div>
  <div class="mb-3">
 
    <input type="file" class="form-control" name="photo">
    <div id="FileHelp" class="form-text"><?php if($error_img!=null){echo $error_image;}?></div>
  </div>
  <input type="submit" class="btn btn-marron pull-right" name="envoyer">
</form>
  <h5 class="<?php if($msg!=null){echo "alert alert-success";}?>"><?php if($msg!=null){echo $msg." "."<a href='login'>Connecter?</a>";}?></h5>
        </div>
 
    </div>
</div>