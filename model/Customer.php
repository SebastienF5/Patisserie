<?php
 class Customer
{
   private $_id;
   private $_sexe;
   private $_pseudo;
   private $_firstname;
   private $_lastname;
   private $_email;
   private $_password;
   private $_tel;
   private $_image;

   public function __construct(array $donnees)
   {
        //fonction hydrate
      foreach ($donnees as $key=>$d)
      {
         $method="set".ucfirst($key);
         if(method_exists($this,$method))
         {
          $this->$method($d);
         }
      }
   }

   //getters

   public function id(){
      return $this->_id;
   }

   public function sexe(){
      return $this->_sexe;
   }

   public function pseudo(){
      return $this->_pseudo;
   }

   public function firstname()
   {
      return $this->_firstname;
   }

   public function lastname()
   {
      return $this->_lastname;
   }

   public function email()
   {
      return $this->_email;
   }

   public function password(){
      return $this->_password;
   }
 
   public function tel(){
      return $this->_tel;
   }

   public function image(){
      return $this->_image;
   }
   //setters

   public function setSexe($sexe){
      $this->_sexe=$sexe;
   }

   public function setPseudo($pseudo){
      $this->_pseudo=$pseudo;
   }
   
   public function setFirstname($fn){
      $this->_firstname=$fn;
   }

   public function setLastname($ln)
   {
      $this->_lastname=$ln;
   }

   public function setEmail($email)
   {
      $this->_email=$email;
   }

   public function setPassword($pass){

      $this->_password=password_hash($pass,PASSWORD_DEFAULT,['cost'=>14]);
   }

   public function setTel($tel){
      $this->_tel=$tel;
   }

   public function setImage($image)
   {
      $this->_image=$image;
   }

   
   public function setId($id)
   {
      $this->_id=$id;
   }
}