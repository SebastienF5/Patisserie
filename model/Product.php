<?php
class Product
{
    private $_id;
    private $_name;
    private $_description;
    private $_price;
    private $_image;
    private $_category;
    private $_qte;

    public function __construct(array $donnees)
    {
        //fonction hydrate
        foreach($donnees as $key=>$value)
        {
            $methode='set'.ucfirst($key);
            if(method_exists($this,$methode))
            {
                $this->$methode($value);
            }
        }
   
    }

  

    //getters
    public function id()
    {
        return $this->_id;
    }

    public function name(){
        return $this->_name;
    }

    public function description()
    {
        return $this->_description;
    }

    public function price()
    {
        return $this->_price;
    }

    public function image()
    {
        return $this->_image;
    }

    public function category()
    {
        return $this->_category;
    }

    public function qte()
    {
        return $this->_qte;
    }
    


    //setters

    public function setId($id)
    {
        $this->_id=$id;
    }

    public function setName($name)
    {
        $this->_name=$name;
    }

    public function setDescription($description)
    {
        $this->_description=$description;
    }

    public function setPrice($price)
    {
        $this->_price=$price;
    }

    public function setImage($image)
    {
        $this->_image=$image;
    }

    public function setCategory($category)
    {
        $this->_category=$category;
    }

    public function setQte($qte)
    {
        $this->_qte=$qte;
    }
}