<div id="container">
    <h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>
    <h2>
        <?php echo $title; ?>
    </h2>
    <h3>Bienvenue <?php echo $membre->pseudo; ?></h3>
    <div class="form">
        <?php //echo validation_erros(); ?>
        <?php echo form_open('post/lister') ?>
        <label for="comment">Commentaire</label></br>
        <textarea cols="55" rows="10" id="comment" value="Commentaire" name="commentaire"></textarea></br>
        <label for="url">Lien à partager</label>
        <input type="url" name="lien" value="http://" id="url" /></br>
        <input type="submit" name="envoyer" value="Partager">
        </form>
    </div>
    <div class="listing">
        <?php if(count($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div class="post">
                <h2>De: <?php echo $post->pseudo; ?></h2>
                <p>Commentaire: <?php echo $post->commentaire; ?></p>
                <h3>Le site: <?php echo $post->titre; ?></h3>
                <p>Description: <?php echo $post->description; ?></p>
                <p>Image: <?php echo img($post->image); ?></p>
                <a class="delete" href="delete/<?php echo $post->id_post; ?>" />X</a>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>