<?php $title = 'Billet simple pour l\'alaska'; ?>
<?php ob_start(); ?>
  <h2 class="card-title-posts">Tous les épisodes</h2>
  <h3 class="card-title-posts">Billet simple pour l'Alaska</h3>
    <div class="container">
      <div class="row">
<?php foreach ($posts as $post):?>
    <div class="col-lg-6 col-lg-6">
        <div class="card">
          <div class="card-posts">
              <p class="card-title">Episode n° <?=$post['id']?> : "<?= htmlspecialchars($post['title'])?>"</p>
              <p class="card-date">Publié le : <?=$post['creation_date_fr']?></p>
              <p class="card-author">Par : <?= htmlspecialchars($post['author'])?></p>
              <p class="card-text"><?= substr(nl2br($post['content']),0,200) ?><br /></p>
              <a class="card-btn"><em><a href="index.php?action=post&amp;id=<?=$post['id']?>" class="btn link">Lire la suite</a></em><br/></a><br/>
          </div>
        </div>
    </div>
<?php endforeach;?>
    </div>
  </div>
<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>