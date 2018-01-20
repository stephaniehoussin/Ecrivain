
<?php
require ('Autoload.php');
$routeur = new Routeur();
$routeur->routerRequete();
ob_start();
$content = ob_get_clean();
