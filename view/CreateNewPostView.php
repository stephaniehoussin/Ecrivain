<?php $title = 'CREER UN NOUVEAU BILLET';?>
<?php ob_start(); ?>
<h2 class="card-title-posts">Ecrire un nouveau Billet :</h2>
<div class="container">
  <div class="row">
  <div class="col-md-4 col-md-offset-4">
  <a href="index.php?action=admin" class="btn btn-primary">Retour vers l'espace d'administration</a>
</div>
</div>
</div>
<div class="container">
  <div class="card">
    <div class="col-lg-12">
<!-- Espace reservé à tinymce -->
<form name="formulaire" id="formulaire" action="index.php?action=validateNewPost" method="post" enctype="multipart/form-data">
<label for="author">Auteur</label><p><input type="text" name="author"/></p>
<label for="title">Titre</label><p><input type="text" name="title"/></p>
<!--<label for="pics">Image : </label><p><input type="file" name="pics"/></p>-->
<label for="content">Contenu</label><p><textarea id="texte" name="content" rows="25"></textarea></p>
<button type="submit" name="submit">Editer le Billet</button>
</form>
</div>
</div>
</div>
<?php $content = ob_get_clean();?>
<?php require('view/template.php'); ?>
