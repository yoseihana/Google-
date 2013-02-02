<!DOCTYPE HTML>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta 	name="Author"
              content="Buffart Annabelle" />
    <meta 	name="Keywords"
              content="sharlink, patage de liens, mes liens" />
    <meta 	name="Description"
              content="Site de partage de liens" />

    <meta 	http-equiv="Content-Language"
              content="fr" />
    <meta 	name="DC.Language"
              content="fr" />
    <meta 	name="DC.Creator"
              content="Buffart Annabelle" />
    <meta 	name="DC.Date.modified"
              scheme="W3CDTF"
              content="25/01/2013" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/css/style.css'); ?>" media="screen" title="Normal"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/css/print.css'); ?>" media="print" title="Normal"/>

    <!--[if lt IE 9]>
    <script>
        document.createElement('header');
        document.createElement('nav');
        document.createElement('section');
        document.createElement('article');
        document.createElement('aside');
        document.createElement('footer');
    </script>
    <![endif]-->

</head>
<body>
<div class="container">
    <?php echo $vue; ?>
</div>
<footer>
    <p>Partages Tes Sites; réalisé par Annabelle Buffart &ndash; INPRES Janvier 2012</p>
</footer>

</body>

</html>