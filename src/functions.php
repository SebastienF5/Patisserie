<?php

function verifParams(){
  if(isset($_POST) && sizeof($_POST)>0){
    foreach($_POST as $key=>$value){
       $data=trim($value);
       $data=stripslashes($data);
       $data=strip_tags($data);
       $data=htmlspecialchars($data);
       $_POST[$key]=$data;
    }
  }
}
function displayAccueil()
{

 require VIEWS.SP."templates".SP."Home.php";


}
function displayContact()
{
  require VIEWS.SP."templates".SP."contact.php";
}

function displayListe(){
  require VIEWS.SP."templates".SP."liste.php";
}

function displayDetail(){
  require VIEWS.SP."templates".SP."detail.php";
}


function displayAbout(){
  require VIEWS.SP."templates".SP."about.php";
}

function displayLogin(){
  require VIEWS.SP."templates".SP."login.php";
}

function displaySignup(){
  require VIEWS.SP."templates".SP."signup.php";
}


function displayPanier(){
  require VIEWS.SP."templates".SP."panier.php";
}


function displayDelete()
{
  require VIEWS.SP."templates".SP."delete.php";
}

function displayValiderPanier()
{
  require VIEWS.SP."templates".SP."validerPanier.php";
}

function displayProfil()
{
  require VIEWS.SP."templates".SP."profil.php";
}

function displayLogout()
{
  require VIEWS.SP."templates".SP."logout.php";
}





