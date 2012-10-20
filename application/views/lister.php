<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Partage tes sites!</title>
</head>
<body>

<div id="container">
	<h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>

    <?php if(count($posts[0])): ?>
    <?php foreach($posts[0] as $post): ?>
	<div id="body">
		<h2>De: <?php echo $post->pseudo; ?></h2>
            <p>Commentaire: <?php echo $post->commentaire; ?></p>
            <?php echo anchor($post->url, $post->url, 'title="Aller sur le site '.$post->url.'" '); ?>
       <h3> <?php echo $html; ?></h3>
    </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>