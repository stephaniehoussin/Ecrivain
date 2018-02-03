<?php
class UserManager extends Manager
{
   public function getUsername($login,$password)
   {
      $db = $this->db();
      $password_hash =hash("sha256", $_POST['password']);
      $req = $db->prepare('SELECT id FROM users WHERE login = :login AND password = :password');
      $req->execute(array('login' => $login, 'password' => $password_hash));
      $user = $req->fetch();
      return $user;
   }

}
