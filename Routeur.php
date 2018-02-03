<?php
session_start();

class Routeur
{
  protected $ctrlFront;
  protected $ctrlAdmin;

  public function __construct()
  {
    $this->ctrlFront= new FrontController();
    $this->ctrlAdmin = new AdminController();
  }

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
          $this->ctrlFront->home();
        }
      elseif($action == 'posts')
        {
          $this->ctrlFront->allPosts();
        }
      elseif($action == 'post')
        {
          if (isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] > 0)
            {
              $this->ctrlFront->onePost();
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
              if (!empty($_POST['author']) && !empty($_POST['comment'] && !ctype_space($_POST['author']) && !ctype_space($_POST['comment']) ))
                {
                  $this->ctrlFront->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
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
      elseif($action == 'reportComment')
        {
          if(isset($_GET['id']) && $_GET['id'] >0)
            {
              $this->ctrlFront->reportComment($_GET['id'], $_GET['postId']);
            }
            else
             {
               throw new Exception('Aucun identifiant de signalement envoyé');
             }
        }
      elseif($action == 'admin')
        {
          if(isset($_SESSION['admin']))
            {
              $this->ctrlAdmin->allAdmin();
            }
          else
            {
              header('Location: index.php?action=login');
            }
        }
      elseif($action == 'login')
        {
          $this->ctrlAdmin->showLogin();
        }
     elseif($action == 'signin')
        {
          $this->ctrlAdmin->signin($_POST['login'], $_POST['password']);
        }
      elseif($action == 'logout')
        {
          $_SESSION = array();
          session_destroy();
          header('Location: index.php');
        }
      elseif($action == 'createNewPost')
        {
          $this->ctrlAdmin->createAdminPost();
        }
      elseif($action == 'validateNewPost')
        {
          if(isset($_POST['author']) && $_POST['title'] && $_POST['content'])
          {
            $this->ctrlAdmin->createNewPost($_POST['author'], $_POST['title'],$_POST['content']);
            $this->ctrlAdmin->allAdmin();
          }
          else
          {
            throw new Exception('Tous les champs ne sont pas remplis !');
          }
        }
      elseif($action == 'deletePost')
        {
          if(isset($_GET['id']) && !empty($_GET['id']))
          {
            $this->ctrlAdmin->deletePost($_GET['id']);
            $this->ctrlAdmin->allAdmin();
          }
        }
        elseif($action == 'updateModifyPost')
           {
             if(isset($_GET['id']) && $_GET['id'] >0 )
             {
               $this->ctrlAdmin->updateModifyPost();
             }
           }
           elseif($action == 'updatePost')
           {
             if(isset($_GET['id']) && $_GET['id'] >0)
             {
               $this->ctrlAdmin->updatePost();
               $this->ctrlAdmin->AllAdmin();
             }
           }
      elseif($action == 'deleteComment')
        {
          if(isset($_GET['id']) && $_GET['id'] >0)
          {
            $this->ctrlAdmin->deleteComment($_GET['id']);
            $this->ctrlAdmin->allAdmin();
          }
        }
      elseif ($action == 'approveComment')
        {
          if(isset($_GET['id']))
            {
              $this->ctrlAdmin->approveComment($_GET['id']);
              $this->ctrlAdmin->allAdmin();
            }
          else
            {
              throw new Exception('Aucun identifiant de signalement à approuver');
            }
          }
          else
          {
            header('Location:index.php?action=home');
          }
        }

   catch(Exception $e)
    {
     //echo 'Erreur : ' . $e->getMessage();
      require('view/errorView.php');
    }
      }
 }
