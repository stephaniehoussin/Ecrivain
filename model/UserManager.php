<?php
// Rôle -> Manager -> effectuer opérations de lecture ecriture sur les tables
// Le CRUD
// TEST => NE SERT A RIEN POUR LE MOMENT
class UserManager extends Manager
{

public function getUsername($login,$password)
{
  $req = $this->db()->prepare('SELECT id FROM users WHERE login = :login AND password = :password');
  $req->execute(array('login' => $login, 'password' => $password));
  $result = $req->fetch();
  return $result;
}
}


 ?>
