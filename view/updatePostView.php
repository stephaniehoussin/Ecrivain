<?php $title = 'CREER UN NOUVEAU BILLET';?>
<?php ob_start(); ?>
<h2>Modifier un Billet :</h2>
<form name="formulaire" id="formulaire" action="index.php?action=updateAdminPost&amp;id=<?= $_GET['id'];?>" method="post">
<label for="author">Auteur</label><p><input type="text" name="author" value="<?= $post['author'];?>"/></p>
<label for="title">Titre</label><p><input type="text" name="title" value="<?= $post['title'];?>"/></p>
<label for="content">Contenu</label><p><textarea id="texte" name="content" rows="25" <?= $post['content'];?></textarea></p>
<button type="submit" name="submit" value="<?= $_GET['id']; ?>">Modifier le Billet</button>
</form>
<?php $content = ob_get_clean();?>
<?php require('view/template.php'); ?>
<!-- Voir la différence avec modifyPostView ? -->
