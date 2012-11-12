<div id="container">
    <h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>
    <div class="form">
        <h2>Bienvenue à toi, <?php echo $membre->pseudo; ?></h2>
        <?php echo form_open('post/ajouter') ?>
        <label for="url">Lien à partager</label>
        <input type="url" name="lien" value="http://www.monlien.com" size="55" id="url" /></br>
        <input type="submit" name="envoyer" value="Partager">
        </form>
    </div>
    <div class="postList">
        <?php if(count($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div class="post">
                <h3><?php echo $post->pseudo; ?> a partagé le site: <?php echo anchor($post->lien, $post->titre, array('title'=>$post->titre, 'alt'=>$post->titre)); ?></h3>
                <p><strong>Ce qu'en pense <?php echo $post->pseudo; ?> : </strong><?php echo $post->commentaire; ?></p>
                <p class="porpos"><strong>A propose du site: </strong><?php echo $post->description; ?></p>
                <p class="image"><?php echo img($post->image); ?></p>
                <div class="modifier">
                    <p><?php echo anchor("post/delete/".$post->id_post, 'X', array('class'=>'delete')); ?></p>
                    <p><?php echo anchor('post/voir/'.$post->id_post, 'Modifier'); ?></p>
                </div>
            </div>
            <?php echo form_open('post/ajouter') ?>
                <input type="hidden" value="<?php echo $post->titre ?>" />
                <input type="hidden" value="<?php echo $post->pseudo ?>" />
                <input type="hidden" value="<?php echo $post->commentaire ?>" />
                <input type="hidden" value="<?php echo $post->description ?>" />
                <input type="hidden" value="<?php echo $post->id_post ?>" />
            </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>