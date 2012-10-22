<body>
<div id="container">
	<h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>
    <h2>
        Lister les posts
    </h2>
    <?php //echo validation_erros(); ?>
    <?php echo form_open('post/creer') ?>
    <label for="auteur">Pseudo</label>
    <input type="text" name="pseudo" value="<?php echo $pseudo ?>" id="auteur"/ ></br>
    <label for="comment">Commentaire</label></br>
    <textarea cols="55" rows="10" id="comment" value="<?php echo $commentaire ?>" name="commentaire"></textarea></br>
    <label for="url">Lien à partager</label>
    <input type="url" name="lien" value="<?php echo $url ?>" id="url" /></br>
    <input type="submit" name="envoyer" value="Ajouter le lien">
    <input type="hidden" name="titre" value="<?php echo $titre ?>"/>
    <input type="hidden" name="description" value="<?php echo $description ?>"/>
    <input type="hidden" name="image" value="<?php echo $images[1]; ?>"/>
    </form>

    <p><?php echo $titre; ?></p>
   <p><?php echo $description ?></p>
    <?php for($i=0; $i<count($images); ++$i):?>
   <p><?php echo img($images[$i]); ?></p>
    <?php endfor; ?>

    <?php if(count($posts)): ?>
    <?php foreach($posts as $post): ?>
	<div id="body">
		<h2>De: <?php echo $post->id_membre; ?></h2>
            <p>Commentaire: <?php echo $post->commentaire; ?></p>
       <h3>Le site: <?php echo $post->titre; ?></h3>
        <p>A propos: <?php echo $post->description; ?></p>
        <p>Image: <?php echo img($post->image); ?></p>
        <a class="delete" href="delete/<?php echo $post->id_post; ?>" />X</a>
    </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
<script src="../../web/jquery.js"></script>
<script>
    $(function(){
        $(".delete").on("click", function(event){
            alert('ok');
            var href= $($this).attr("href");
            $.ajax({
                url:href,
                success: function(data){
                    console.log(data);
                }
            });

         });
        event.preventDefault();
    })

</script>

</html>