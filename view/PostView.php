<?php $title = 'Billet n°'.$_GET['id']; ?>
<?php ob_start(); ?>
<!-- Affichage d'un billet et de la possibilité de laisser un commentaire-->
<div class="col-sm-12 text-center">
  <p><a href="index.php?action=posts" class="btn btn-primary">Retour à la liste de tous les épisodes</a></p>
</div>
<div class="container">
  <div class="card">
    <h1 class="card-title">Episode n° : <?= $post->getId(); ?></h1>
  </div>
  <div class="card">
    <div class="card-post">
      <div class="col-lg-12">
          <h2 class="card-title">  <?= htmlspecialchars($post->getTitle()); ?></h2>
          <p class="card-author">par <?= htmlspecialchars($post->getAuthor());?></p>
          <p class="card-date">le <?= $post->getCreation_date(); ?></p>
          <p class="card-text"><?= nl2br($post->getContent()); ?></p>
          <br/>
      </div>
  <div class="card">
      <div class="card-comments">
          <div class="col-lg-8">
              <h2 class="card-title-comments">Laissez nous votre commentaire :</h2><br/>
              <form action="index.php?action=addComment&amp;id=<?= $post->getId();?>" method="post">
          <div>
              <label for="author">Votre nom :</label><br />
              <input type="text" id="author" name="author" />
          </div>
          <div>
              <label for="comment">Votre commentaire :</label><br />
              <textarea id="comment" name="comment"></textarea>
          </div>
          <div>
              <input type="submit" value="Envoyer" />
          </div>
            </form>
          </div>
      </div>
  </div>
  <br/>
  <div class="card">
    <div class="card-report">
      <div class="col-lg-8">

        <?php foreach ($comments as $comment) :?>

          <p class="card-author">Commentaire laissé par : <?= htmlspecialchars($comment->getAuthor()); ?></p>
          <p class="card-date">le <?= $comment->getComment_date(); ?></p>
          <p class="card-comment"><?= nl2br(htmlspecialchars($comment->getComment())); ?></p>
          <p><a href="index.php?action=reportComment&amp;id=<?= $comment->getId();?>&amp;postId=<?= $post->getId();?>
          "<button type="button" class="btn btn-primary btn-sm">Signaler ce commentaire</a></button></p>
        <?php if($comment->getIs_signaled()) :; ?><p class="card-message"> Le commentaire a bien été signalé !</p>
        <?php endif ?>
        <?php endforeach ;?>

    </div>
  </div>
</div>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>
