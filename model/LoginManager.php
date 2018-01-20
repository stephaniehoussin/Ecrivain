<?php
// Rôle -> Manager -> effectuer opérations de lecture ecriture sur les tables
// Le CRUD
// TEST => NE SERT A RIEN POUR LE MOMENT
class LoginManager extends Manager
{
// fonction  insere les infos de connexion
/*  public function InsertLogin($login,$pass_hash)
  {
    $req = $this->db()->prepare('INSERT INTO users(login,password) VALUES(:login, :password)');
    $req->execute(array(
      'login' => $login,
      'password' => $pass_hash
    ));
  }*/
  // fonction qui recupere les infos de connexion
/*  public function LoginConnexion($login,$pass_hash)
  {

      $req = $this->db()->prepare('SELECT id FROM users WHERE login = :login AND password = :password');
      $req->execute(array('login' => $login,
    'password'=> $pass_hash));

      $reponse = $req->fetch();
      if($reponse && $_POST['password'] === $pass_hash)
      {
         header('Location :index.php?action=admin');
      }
      else {
          echo 'Mauvais identifiant ou mot de passe';
      }

}*/
}


 ?>
