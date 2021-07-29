<?php
require "include.php";
verifParams();
if(!isset($_SERVER['PATH_INFO'])){
  $function="displayAccueil";
  $title="Page | Accueil";
  $content=$function();
  require VIEWS.SP."templates".SP."default.php";
  
}
//pour enlever les espaces autour du /
else{
$url=trim($_SERVER['PATH_INFO'],'/');
$url=explode('/',$url);
$route=array("accueil","contact","liste","detail","about","login","signup","panier","delete","validerPanier","profil","logout");
//recuperation de l'action du user
$action=$url[0];


//controller

if(!in_array($action,$route))
{
    $title="Page Error";
    $content="URL introuvable";
}
else
{

  //echo "Bienvenue dans l'action $action";
  $function="display".ucFirst($action);
  $title="Page | ".$action;
  $content=$function();
  }
  require VIEWS.SP."templates".SP."default.php";
 
}

