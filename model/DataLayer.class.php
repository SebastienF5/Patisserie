<?php
class DataLayer
{
private $_connection;

  public function getConnection()

  {
  
      try
      {
        $connection=new PDO("mysql:host=".HOST.";dbname=".DB_NAME,DB_USER,PASSWORD);
    
        return $connection;
      }catch(PDOException $e)
      {
       echo $e->getMessage();
      }
  }

  public function hi(){
    echo "Hi";
  }
}