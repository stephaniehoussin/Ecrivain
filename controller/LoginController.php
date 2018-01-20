<?php
class LoginController
{
  // Appel de la vue de login
   public function login()
     {
       require('view/LoginView.php');
     }

     public function loginConnexion($login,$password)
     {
        if($login == 'admin' && $password == 'toto')
        {
          $_SESSION['admin'] = 'JForteroche';
          return true;
        }
        return false;
        // $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT); // code openclassrooms
         //$LoginManager = new LoginManager();
         //$reponse = $LoginManager->LoginConnexion($login, $pass_hash);
     }
  }
 ?>
