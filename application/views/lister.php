<div id="container">
    <h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>
    <h2>
        <?php echo $title; ?>
    </h2>
    <h3>Bienvenue <?php echo $membre->pseudo; ?></h3>

    <div class="form">
        <?php //echo validation_erros(); ?>
        <?php echo form_open('post/creer') ?>
        <label for="comment">Commentaire</label></br>
        <textarea cols="55" rows="10" id="comment" value="<?php echo $commentaire ?>" name="commentaire"><?php echo $commentaire ?></textarea></br>
        <label for="url">Lien à partager</label>
        <input type="url" name="lien" value="<?php echo $url ?>" id="url" /></br>
        <input type="submit" name="envoyer" value="Ajouter le lien">
        <input type="hidden" name="titre" value="<?php echo $titre ?>"/>
        <input type="hidden" name="description" value="<?php echo $description ?>"/>
        <input type="hidden" name="image" value="<?php echo $images[1]; ?>"/>
        </form>
    </div>
    <div class="postSubmit">
        <p><?php echo $titre; ?></p>
       <p><?php echo $description ?></p>
        <?php for($i=0; $i<count($images); ++$i):?>
       <p><?php echo img($images[$i]); ?></p>
        <?php endfor; ?>
    </div>

    <div class="listing">
        <?php if(count($posts)): ?>
        <?php foreach($posts as $post): ?>
        <div id="post">
            <h3>De: <?php echo $post->id_membre; ?></h3>
                <p>Commentaire: <?php echo $post->commentaire; ?></p>
            <p>Le site: <?php echo $post->titre; ?></p>
            <p>A propos: <?php echo $post->description; ?></p>
            <p>Image: <?php echo img($post->image); ?></p>
            <a class="delete" href="delete<?php echo $post->id_post; ?>" />X</a>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

</body>

</html>