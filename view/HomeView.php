<?php $title = 'Billet simple pour l\'alaska'; ?>
<?php ob_start(); ?>
  <div class="container">
    <div class="card">
      <div class="card-home-title">
      <h1 class="card-title">Billet simple pour l'Alaska</h1>
      <h2 class="card-author">Le nouveau roman de Jean Forteroche</h2>
    </div>
  </div>
<div class="image" style="background-image : url('public/img/7.jpg')">
</div>
<h2 class= "card-title-posts">Les derniers épisodes publiés du roman</h2>
<br/>
  <div class="row">
<?php foreach ($lastPost as $post): ?>
  <div class="col-lg-6 col-lg-6">
    <div class="card">
      <div class="card-home">
        <p class="card-title">Episode n° <?=$post->getId();?> : "<?= htmlspecialchars($post->getTitle());?>"</p>
        <p class="card-date">Publié le : <?= $post->getCreation_date();?></p>
        <!--$date = new DateTime($maDateDansMaBDD,new DateTimeZone('Paris/Europe'));-->
        <p class="card-author">Par : <?= htmlspecialchars($post->getAuthor());?></p>
        <p class="card-text"><?= substr(nl2br($post->getContent()),0,400);?></p>
        <a class="card-btn"><em><a href="index.php?action=post&amp;id=<?=$post->getId();?>" class="btn link">Lire la suite</a></em><br/>
      </div>
    </div>
  </div>
<?php endforeach; ?>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>
