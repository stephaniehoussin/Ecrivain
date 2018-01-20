<?php
// classe de connexion à la bdd
// Est ce que c'est utile de garder le bloc try catch ?
class Manager
{
   protected $db;
   public function __construct(){
    try
    {
        $this->db = new \PDO('mysql:host=localhost;dbname=alaska;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (\Exception $e)
    {
        die ('Erreur :'.$e->getMessage());
    }
}
    public function db(){
        return $this->db;
    }
}
