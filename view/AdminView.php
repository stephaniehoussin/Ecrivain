<?php $title = 'TABLEAU DE BORD';?>
<?php ob_start();?>
<div class="container">
  <div class="card">
    <div class="row">
      <div class="col-lg-4">
          <a class="nbr" href="#posts"> <?= $postsNbr[0];?> Billets publiés</a>
      </div>
      <div class="col-lg-4">
          <a class="nbr" href="#comments"><?= $commentsNbr[0];?> Commentaire(s)</a>
      </div>
      <div class="col-lg-4">
         <a class="nbr_signal" href="#comments"><?= $commentsReport[0];?> Commentaires signalé(s)</a>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="card">
      <h2 class="card-title-posts">Tableau de bord</h2>
      <div class="col-sm-12 text-center">
          <a href="index.php?action=createNewPost" class="btn btn-success btn-xs" >Créer un nouveau billet</a>
          <a href="index.php?action=logout" class="btn btn-danger btn-xs" onclick="return confirm('Etes vous sur de vouloir vous déconnecter?')">Déconnexion</a>
      </div>
    </div>
</div>

<div id="posts" class="container-fluid">
    <div class="card">
        <p class="card-title">Administration des Episodes</p>
    </div>
    <div class="card">
        <table class ="table table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post):?>
              <tr>
                  <td><?= $post->getId(); ?></td>
                  <td><?= $post->getCreation_date();?></td>
                  <td><?= htmlspecialchars($post->getTitle());?></td>
                  <td><?= substr($post->getContent(),0,200); ?></td>
                  <td><a href="index.php?action=updateModifyPost&amp;id=<?= $post->getId();?>">Modifier</a></td>
                  <td><a href="index.php?action=deletePost&amp;id=<?= $post->getId();?>" onclick="return confirm('Etes vous certain de vouloir effacer ce Billet?')">Supprimer</a></td>
             </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

<div id="comments" class="container-fluid">
    <div class="card">
        <p class="card-title">Administration des Commentaires</p>
    </div>
    <div class="card">
        <table class="table table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Id Episode</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Signalement</th>
                    <th scope="col">Approuver</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>

            <?php foreach ($comments as $comment):?>
                <tr>
                    <td><?= $comment->getId();?></td>
                    <td><?= $comment->getPostId(); ?></td>
                    <td><?= htmlspecialchars($comment->getAuthor()); ?></td>
                    <td><?= $comment->getComment_date(); ?></td>
                    <td><?= htmlspecialchars($comment->getComment()); ?></td>
                    <td><?php if($comment->getIs_signaled()==1): echo "Commentaire signalé !" ;elseif($comment->getIs_signaled()==0): echo ''; endif; ?></td>
                    <td><a href="index.php?action=approveComment&amp;id=<?= $comment->getId();?>"
                    onclick="return confirm('Etes vous certain de vouloir approuver ce commentaire?')">Approuver</td>
                    <td><a href="index.php?action=deleteComment&amp;id=<?= $comment->getId();?>
                    " onclick="return confirm('Etes vous certain de vouloir effacer ce Commentaire?')" >Supprimer</td>
                </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean();?>
<?php require('view/template.php'); ?>
