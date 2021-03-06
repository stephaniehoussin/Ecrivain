<?php $title = 'MODIFIER UN BILLET';?>
<?php ob_start(); ?>
<h2 class="card-title-posts">Modifier un Billet :</h2>
  <div class="col-sm-12 text-center">
    <a href="index.php?action=admin" class="btn btn-primary">Retour vers l'espace d'administration</a>
  </div>
  <div class="container">
    <div class="card">
      <div class="col-lg-12">
        <form name="formulaire" id="formulaire" action="index.php?action=updatePost&amp;id=<?= $post->getId();?>" method="post">
          <label for="author">Auteur</label><p><input type="text" name="author" value="<?= $post->getAuthor();?>"/></p>
          <label for="title">Titre</label><p><input type="text" name="title" value="<?= $post->getTitle();?>"/></p>
          <label for="content">Contenu</label><p><textarea id="texte" name="content" rows="25" <?= $post->getContent();?></textarea></p>
          <button type="submit" name="submit" value="<?= $post->getId(); ?>">Modifier le Billet</button>
        </form>
      </div>
    </div>
  </div>
<?php $content = ob_get_clean();?>
<?php require('view/template.php'); ?>
