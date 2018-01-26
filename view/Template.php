<!DOCTYPE html>
<html lang="fr">
<!-- Voir si vraiment utile de laisser toute cette liste -->
    <head>
        <meta charset="utf-8">
        <!-- template de base , ne concerne que IE -->
        <meta http-equiv="X-UA-compatible" content-"IE-edge">
        <!-- ligne qui concerne les mobiles = occupe tout l'espace avec une taille de 1 -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- bootstrap CSS à déclarer dans le head -->
        <!-- penser à mettre la version .min lors du passage du blog en ligne -->
        <link href="public/css/bootstrap.css" rel="stylesheet">
        <!-- css -->
        <link href="public/css/style.css" rel="stylesheet"type="text/css" >
        <!-- Intégration TinyMCE  -->
        <script type="text/javascript" src="public/js/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
        tinyMCE.init({
          width : 700,
          height : 500,
            entity_encoding : "raw",
            encoding : "utf-8",
            mode : "exact",
            elements : "texte,texte2",
            theme : "advanced",
            plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
            //forced_root_block : false,
            //force_br_newlines : true,
            //force_p_newlines : false,
            // les outils à afficher
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
            theme_advanced_toolbar_location : "top",  // emplacement de la toolbar
            theme_advanced_toolbar_align : "left",  // alignement de la toolbar
            theme_advanced_statusbar_location : "bottom",// positionnement de la barre de statut
            theme_advanced_resizing : true,// permet de redimensionner la zone de texte
             content_css : " public/js/design-tiny.css",// chemin vers le fichier css
            theme_advanced_font_sizes: "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px",// taille disponible
            theme_advanced_text_colors : "33FFFF, 007fff, ff7f00",// couleur disponible dans la palette de couleur
            theme_advanced_blockformats : "h1, h2,h3,h4,h5,h6,p",// balise html disponible
            theme_advanced_styles : "Tableau=textTab;TableauSansCadre=textTabSansCadre;",// class disponible
        });
  </script>
        <title><?= $title ?></title>
    </head>
    <body>
<?php include('view/Nav.php');?>
<!--<p class="title">Billet Simple pour L'Alaska</p>-->
        <?= $content ?><!-- utilisation de la variable $content -->
<?php include('view/Footer.php'); ?>
        <!-- Bootstrap JS et jquery -->
        <!-- penser à mettre la version .min -->
        <script src="public/js/jquery.js"></script>
        <script src="public/js/bootstrap.js"></script>
    </body>
</html>
