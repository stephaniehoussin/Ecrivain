<?php $title = 'TABLEAU DE BORD';?>
    <?php ob_start();?>
    <h2 class="card-title-posts">TABLEAU DE BORD</h2>
    <div class="admin-button">
      <a href="index.php?action=createNewPost" class="btn btn-success btn-xs" >Créer un nouveau billet</a>
      <a href="index.php?action=logout" class="btn btn-danger btn-xs" onclick="return confirm('Etes vous sur de vouloir vous déconnecter?')">Déconnexion</a>
    </div>
      <div class="card">
        <p class="card-title">Administration des Episodes</p>
      </div>
      <!-- BILLETS  => revoir la mise en forme  -->
      <table class ="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Identifiant</th>
            <th scope="col">Date</th>
            <!--<th scope="col">Auteur</th>-->
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <!-- boucle et affichage des billets => revoir la mise en forme-->
          <?php foreach ($posts as $post):?>
           <tr>
             <td><?= $post['id'] ?></td>
             <td><?= $post['creation_date_fr'] ?></td>
            <!-- <td><?= htmlspecialchars($post['author'])?></td>-->
             <td><?= htmlspecialchars($post['title']) ?></td>
             <td><?= substr($post['content'],0,200) ?></td><!-- limitation à 400 caractères -->
             <td><a href="index.php?action=updateModifyPost&amp;id=<?= $post['id'] ?>">Modifier</a></td>
             <td><a href="index.php?action=deletePost&amp;id=<?= $post['id']?>" onclick="return confirm('Etes vous certain de vouloir effacer ce Billet?')">Supprimer</a></td>
           </tr>
        <?php endforeach;?>
        </tbody>
      </table>
    <!-- COMMENTAIRES -->
    <div class="card">
      <p class="card-title">Administration des Commentaires</p>
    </div>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <!--<th scope="col">Identifiant</th>-->
            <th scope="col">Episode associé</th>
            <th scope="col">Auteur</th>
            <th scope="col">Date</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Signalement</th><!-- A finir -->
            <th scope="col">Approuver</th><!-- A finir -->
            <th scope="col">Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <!-- Boucle des commentaires et affichage -->
          <?php foreach ($comments as $comment):?>
           <tr>
             <!--<td><?= $comment['id'] ?></td>-->
             <td><?= $comment['postId'] ?></td>
             <td><?= htmlspecialchars($comment['author']) ?></td>
             <td><?= $comment['comment_date_fr'] ?></td>
             <td><?= htmlspecialchars($comment['comment']) ?></td>
             <td><?php if($comment['is_signaled'] ==1): echo'Commentaire signalé'; ?><?php ;elseif($comment['is_signaled']==0): echo '';?><p></p> <?php endif;?></td>
             <td><a href="index.php?action=approveComment&amp;id=<?= $comment['id']?>"
             onclick="return confirm('Etes vous certain de vouloir approuver ce commentaire?')">Approuver</td>
             <td><a href="index.php?action=deleteComment&amp;id=<?= $comment['id']?>
              " onclick="return confirm('Etes vous certain de vouloir effacer ce Commentaire?')" >Supprimer</td>
           </tr>
         <?php endforeach;?>
        </tbody>
      </table>
<?php $content = ob_get_clean();?>
<?php
require('view/template.php'); ?>
