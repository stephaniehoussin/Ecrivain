<?php
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
