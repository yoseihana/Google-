<body>
<div id="container">
	<h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>
    <h2>
        Lister les posts
    </h2>
    <p><?php echo $titre; ?></p>
   <p><?php echo $description ?></p>

    <?php if(count($posts)): ?>
    <?php foreach($posts as $post): ?>
	<div id="body">
		<h2>De: <?php echo $post->pseudo; ?></h2>
            <p>Commentaire: <?php echo $post->commentaire; ?></p>
            <?php echo anchor($post->url, $post->url, 'title="Aller sur le site '.$post->url.'" '); ?>
       <h3><?php echo $title; ?></h3>
        <p><?php echo $meta; ?></p>
    </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>