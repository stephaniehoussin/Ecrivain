<?php
// ouverture de la session
session_start();
//require('controller/PostController.php');
// Essayer de rendre cette page plus claire -->
// Voir si y'a pas moyen d'optimiser le code -->
class Routeur
{
public function routerRequete()
 {
   try {
     if(isset($_GET['action']))
        {
		        $action = $_GET['action'];
		    }
		 else
        {
		 	      $action = 'home';
		    }
     if($action == 'home')
        {
            $controller = new FrontController();
            $controller->home();
        }
        elseif($action == 'posts')
        {
          $controller = new FrontController();
          $controller->allPosts();
        }
        elseif($action == 'post')
           {
               if (isset($_GET['id']) && $_GET['id'] > 0)
                   {
                       $controller = new FrontController();
                       $controller->onePost();
                   }
               else
                 {
                       throw new Exception('Aucun identifiant de billet envoyé');
                 }
           }
      elseif($action =='addComment')
        {
            if (isset($_GET['id'])&& $_GET['id'] >0)
                {
                    if (!empty($_POST['author']) && !empty($_POST['comment']))
                      {
                          $controller = new FrontController();
                          $controller->addComment($_GET['postId'], $_POST['author'], $_POST['comment']);
                      }
            else
              {
                  throw new Exception('Tous les champs ne sont pas remplis !');
              }
                }
            else
              {
                  throw new Exception('Aucun identifiant de billet envoyé');
              }
        }
       elseif($action == 'login')
          {
            $controller = new AdminController();
            $controller->showLogin();
          }
        elseif($action == 'admin')
          {
            if(isset($_SESSION['id'])){
              $controller = new AdminController();
              $controller->allAdmin();
            }
            else{
              throw new Exception('pas d\'autorisation');
            }

          }
          elseif($action == 'signin'){
            $controller = new AdminController();
            $controller->signin($_POST['login'], $_POST['password']);
          }
          elseif($action == 'logout'){
            $_SESSION = array();
            session_destroy();
            header('Location: index.php');
          }
          elseif($action == 'createNewPost')
            {// declenche l'appelle a la vue de tinycme
               $controller = new AdminController();
               $controller->createAdminPost();
            }
          elseif($action == 'validateNewPost')
            {
                $controller = new AdminController();
                $controller->createNewPost($_POST['author'], $_POST['title'],$_POST['content']);
                $controller->allAdmin();
            }
            elseif($action == 'deletePost')
            {
                $controller = new AdminController();
                $controller->deletePost($_GET['id']);
                $controller->allAdmin();
            }
            elseif($action == 'deleteComment')
            {
                $controller = new AdminController();
                $controller->deleteComment($_GET['id']);
                $controller->allAdmin();
            }
            elseif($action == 'updateModifyPost')
            {
              $controller = new AdminController();
              //$controller->updateModifyPost();
              $controller->updateAdminPost();
              $controller->allAdmin();
            }
            elseif($action == 'updateAdminPost')
            {
              $controller = new AdminController();
              $controller->updateAdminPost();
              $controller->allAdmin();
            }
            elseif($action == 'reportComment')
            {
              if(isset($_GET['id']) && $_GET['id'] >0)
              {
                $controller = new FrontController();
                $controller->reportComment($_GET['id'], $_GET['postId']);
                //$_GET['id'], $_GET['postId']
              }
              else {
                throw new Exception('Aucun identifiant de signalement envoyé');

              }
            }
            elseif ($action == 'approveComment') {

              if(isset($_GET['id']))
              {
                $controller = new AdminController();
                $controller->approveComment($_GET['id']);
                $controller->allAdmin();
              }
              else {
                throw new Exception('Aucun identifiant de signalement à approuver');

              }
            }

              }
  // throw new Exception = si erreur -> arrete le bloc try et renvoi directement au bloc catch
  // le bloc catch recupere le message d'erreur et l'affiche
  // ICI -> je vais personnaliser les erreurs et ecrire un truc du style
  // catch(Exception $e){$errorMessage = $e->getMessage(); require('view/errorView.php')}
catch(Exception $e)
 {
  echo 'Erreur : ' . $e->getMessage();
}
 }
}
?>
