<?php $title = 'MODIFIER UN BILLET';?>
<?php ob_start(); ?>
<h2>Modifier un Billet :</h2>
<!-- Appel l'ouverture de tinymce pour modification du billet-->
  <form name="formulaire" id="formulaire" action="index.php?action=updatemodifyPost&amp;id=<?= $post->getId();?>" method="post">
    <label for="author">Auteur</label><p><input type="text" name="author" value="<?= $post->getAuthor();?>"/></p>
    <label for="title">Titre</label><p><input type="text" name="title" value="<?= $post->getTitle();?>"/></p>
    <label for="content">Contenu</label><p><textarea id="texte" name="content" rows="25"><?= $post->getContent();?></textarea></p>
    <button type="submit" name="submit" value="<?= $post->getId(); ?>">Modifier le Billet</button>
</form>
<?php $content = ob_get_clean();?>
<?php require('view/template.php'); ?>
