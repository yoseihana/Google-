<!DOCTYPE HTML>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/css/style.css'); ?>" media="screen" title="Normal"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/css/fontello-codes.css'); ?>" media="screen" title="Normal"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/css/fontello-ie7-codes.css'); ?>" media="screen" title="Normal"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/css/fontello-ie7.css'); ?>" media="screen" title="Normal"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('web/css/fontello.css'); ?>" media="screen" title="Normal"/>

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