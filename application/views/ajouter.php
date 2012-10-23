<div id="container">
    <h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>
    <div class="form">
        <?php //echo validation_erros(); ?>
        <h2>Bienvenue à toi, <?php echo $membre->pseudo; ?></h2>
        <?php echo form_open('post/lister') ?>
        <label for="url">Lien à partager</label>
        <input type="url" name="lien" value="http://www.monlien.com" size="55" id="url" /></br>
        <input type="submit" name="envoyer" value="Partager">
        </form>
    </div>
    <div class="postList">
        <?php if(count($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div class="post">
                <h3><?php echo $post->pseudo; ?> a partagé le site: <?php echo $post->titre; ?></h3>
                <p><strong>Ce qu'en pense <?php echo $post->pseudo; ?> : </strong><?php echo $post->commentaire; ?></p>
                <p class="porpos"><strong>A propose du site: </strong><?php echo $post->description; ?></p>
                <p><?php echo anchor('post/modifier/'.$post->id_post, 'Modifier le commentaire et/ou la descrition'); ?></p>
                <p class="image"><?php echo img($post->image); ?></p>
                <p><?php echo anchor("post/delete/".$post->id_post, 'X', array('class'=>'delete')); ?></p>
            </div>
            <form>
                
            </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>