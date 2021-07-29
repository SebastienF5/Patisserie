<?php
function load($className){
    require "$className".'.php';
   }
 
   spl_autoload_register('load');
class ProductManager
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
     * fonction pour afficher tous les produits
     * @return array prod
     */

     public function getList()
     {
         $products=[];
         $q=$this->_db->query('SELECT * FROM product GROUP BY id LIMIT 0,3');
         while($donnees=$q->fetch(PDO::FETCH_ASSOC))
         {
             $products[]=new Product($donnees);
         }

         return $products;
     }

       /**
     * fonction pour afficher les produits a partir de 4
     * @return array prod
     */

    public function getListFor()
    {
        $products=[];
        $q=$this->_db->query('SELECT * FROM product GROUP BY id LIMIT 6,9');
        while($donnees=$q->fetch(PDO::FETCH_ASSOC))
        {
            $products[]=new Product($donnees);
        }

        return $products;
    }

         /**
     * fonction pour afficher les produits 
     * @return array prod
     */

    public function getAll()
    {
        $products=[];
        $q=$this->_db->query('SELECT * FROM product');
        while($donnees=$q->fetch(PDO::FETCH_ASSOC))
        {
            $products[]=new Product($donnees);
        }

        return $products;
    }

    /**
     * fonction pour les listes de categories
     * @return la liste des categories
     */

     public function getCategory(){
         $cat=[];
         $q=$this->_db->query('select distinct category from product');
         while($donnees=$q->fetch(PDO::FETCH_ASSOC))
         {
             $cat[]=$donnees;
         }

         return $cat;
     }

     /**
      * function pour retourner des categories
      *@return table cat
      */
      public function getCat($category){
        $cat=[];
        $q=$this->_db->prepare('select * from product where category=:categories');
        $q->bindValue(':categories',$category);
        $q->execute();
        while($donnees=$q->fetch(PDO::FETCH_ASSOC))
        {
            $cat[]=new Product($donnees);
        }

        return $cat;
    }

    /**
     * function pour avoir un produit a pratir d un id
     * @return Product prod
     */

     public function detailProduct($id)
     {
         $q=$this->_db->prepare('SELECT * FROM product WHERE id=:id');
         $q->bindValue(':id',$id);
         $q->execute();

         $donnees=$q->fetch(PDO::FETCH_ASSOC);

         return new Product($donnees);
     }

     public function nombreProduit($nb){
         return $nb;
     }
}