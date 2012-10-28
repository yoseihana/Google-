<div id="container" xmlns="http://www.w3.org/1999/html">
	<h1><?php echo anchor(base_url('post/ajouter'), 'Bienvenue sur le site communautaire "Partage tes sites"!', array('title'=>'Accueil du site de partage')); ?></h1>
    <div class="form">
        <h2>Veux-tu partager ce site, <?php echo $membre->pseudo; ?>?</h2>
        <p><?php echo anchor(base_url('post/ajouter'), 'Retour à la page d\'acceuil', array('title'=>'Accueil du site de partage')); ?></p>
        <?php echo form_open('post/creer') ?>
        <label for="comment">Commentaire</label></br>
        <textarea cols="55" rows="10" id="comment" value="Commentaire" name="commentaire"></textarea></br>
        <label for="lien">Lien à partager</label>
        <input type="url" name="lien" size="55" value="<?php echo $url ?>" id="lien" name="url" /></br>
        <label for="title">Titre</label>
        <input type="text" name="titre" id="title" size="70" value="<?php echo $titre ?>"/></br>
        <label for="describ">Description</label></br>
        <textarea cols="55" rows="10" name="description" id="describ" value="<?php echo $description ?>"/><?php echo $description ?></textarea></br>
        <?php for($i=0; $i<count($images); ++$i):?>
        <div class="images">
        <input type="radio" name="image" value="<?php echo $images[$i]; ?>" />
            <p><?php echo img($images[$i]); ?></p>
        </div>
        <?php endfor; ?>
        <input type="submit" name="envoyer" value="Ajouter le lien">

        <input type="hidden" name="membre" value="<?php echo $membre->id_membre; ?>"/>
        </form>
    </div>
    <h2>
        Lister les posts
    </h2>
    <div class="postList">
        <?php if(count($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div class="post">
                <h3><?php echo $post->pseudo; ?> a partagé le site: <?php echo $post->titre; ?></h3>
                <p><strong>Ce qu'en pense <?php echo $post->pseudo; ?> : </strong><?php echo $post->commentaire; ?></p>
                <p class="porpos"><strong>A propose du site: </strong><?php echo $post->description; ?></p>
                <p><?php echo anchor('post/voir/'.$post->id_post, 'Modifier le commentaire et/ou la descrition'); ?></p>
                <p class="image">
                <?php //for($image=0; $image<count($posts); ++$image): ?>
                <?php //echo img('web/uploads/'.strtolower(str_replace(' ', '', $post->titre)).$image.'.jpg'); ?>
                <?php //endfor; ?>
                <?php echo img($post->image); ?>
                </p>
                <p><?php echo anchor("post/delete/".$post->id_post, 'X', array('class'=>'delete')); ?></p>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
</div>