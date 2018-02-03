<?php $title =" Erreur" ; ?>
<?php ob_start(); ?>
<div class="container">
  <div class="card">
    <h1 class="card=title">Oups, il semble qu'une erreur soit survenue! </h1>
  </div>
  <div class="card">
    <div class="card-error">
    <?php print $e->getMessage();?>
  </div>
</div>
<div class="card">
  <div class="col-sm-12 text-center">
    <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>"><button type="button" class="btn btn-info text-white btn-lg">
      Retour à la page precédente</button></a>
    </div>
  </div>
</div>

<?php $content=ob_get_clean(); ?>
<?php require('view/template.php'); ?>
