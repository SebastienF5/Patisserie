<?php

class CustomerManager
{
    private $_db;

    public function __construct($db)
    {
       $this->setDb($db);
    }

    public function setDb($db)
    {
        $this->_db=$db;
    }

    /**
     * function pour inserer utilisateur
     * @param un objet de type Customer
     */

     public function insertUser(Customer $cust)
     {
        $q=$this->_db->prepare('INSERT INTO customers(pseudo,firstname,lastname,sexe,email,password,tel,image) VALUES(:pseudo,:firstname,:lastname,:sexe,:email,:passwords,:tel,:images)');
        
        $q->bindValue(':pseudo',$cust->pseudo());
        $q->bindValue(':firstname',$cust->firstname());
        $q->bindValue(':lastname',$cust->lastname());
        $q->bindValue(':sexe',$cust->sexe());
        $q->bindValue(':email',$cust->email());
        $q->bindValue(':passwords',$cust->password());
        $q->bindValue(':tel',$cust->tel());
        $q->bindValue(':images',$cust->image());
        $q->execute();
    }

    /**
     * supprimer un utilisateur
     * @param id du customer
     */

    public function deleteUser($id){
        $q=$this->_db->exec('DELETE FROM customers WHERE id='.$id);
    }

    /**
     * fonction pour modifier user
     * @param un objet de type Customer
     */
    public function updateUser(Customer $cust)
    {
        $q=$this->_db->prepare('UPDATE customers SET pseudo=:pseudo,firstname=:firstname,
        lastname=:lastname,sexe=:sexe,email=:email,password=:password,tel=:tel,image=:image WHERE id=:id');

        $q->bindValue(':pseudo',$cust->pseudo());
        $q->bindValue(':firstname',$cust->firstname());
        $q->bindValue(':lastname',$cust->lastname());
        $q->bindValue(':sexe',$cust->sexe());
        $q->bindValue(':email',$cust->email());
        $q->bindValue(':password',$cust->password());
        $q->bindValue(':tel',$cust->tel());
        $q->bindValue(':image',$cust->image());
        $q->bindValue(':id',$cust->id());

        $q->execute();
    }

    /**
     * function pour afficher USER specifique
     * @param id du USER
     * @return array()
     */

    public function getUser($id)
    {

       $q=$this->_db->prepare('SELECT * FROM customers WHERE id=:id');
       $q->bindValue(':id',$id);
       $q->execute();
      
       $donnees=$q->fetch(PDO::FETCH_ASSOC);
           return $donnees;
       }
    
    /**
     * function permettant de verifier couple pseudo/password 
     * @param pseudo,password
     * @return true or false
     */

     public function identification($pseudo,$password):bool
     {
         $data=[];
        $q=$this->_db->prepare('SELECT pseudo,password FROM customers WHERE pseudo=:pseudo');
        $q->bindValue(':pseudo',$pseudo);
    

         $q->execute();
        
        while($donnees=$q->fetch(PDO::FETCH_ASSOC)){
            
            if($donnees['pseudo']==$pseudo && password_verify($password,$donnees['password']))
            {
              
                   return true;
            }
        }
        return false;
     }
}