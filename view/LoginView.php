<?php $title = 'login';?>
<?php ob_start(); ?>
<h2 class="card-title-posts">Connexion à l'espace d'administration</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-form">
            <form action="index.php?action=signin" method="post">
              <label for="Login">Identifiant</label>
              <input type="login" class="form-control" placeholder="Votre identifiant" name="login" required=""/></br>
              <label for="Password">Mot de Passe</label>
              <input type="password" class="form-control" placeholder="Votre mot de passe" name="password" required=""/></br>
              <button class="btn btn-lg btn-primary btn-block" type"submit">Se connecter</button>
            </form>
        </div>
      </div>
      <div class="card">
        <a href="index.php?action=home" class="btn btn-danger btn-xs" role="button" aria-pressed="true"><i class="fa fa-home"></i> Retour vers l'accueil</a>
      </div>
    </div>
  </div>
</div>
<?php $content = ob_get_clean();
require ('view/template.php');
