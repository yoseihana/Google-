<div id="container">
	<h1><?php echo anchor(base_url('index.php/post/lister'), 'Bienvenue sur le site communautaire "Partage tes sites"!', array('title'=>'Accueil du site de partage')); ?></h1>
    <div class="form">
        <h2>Veux-tu partager ce site, <?php echo $membre->pseudo; ?>?</h2>
        <p><?php echo anchor(base_url('index.php/post/lister'), 'Retour à la page d\'acceuil', array('title'=>'Accueil du site de partage')); ?></p>
        <?php echo form_open('post/creer') ?>
        <label for="comment">Commentaire</label></br>
        <textarea cols="55" rows="10" id="comment" value="Commentaire" name="commentaire"></textarea></br>
        <label for="lien">Lien à partager</label>
        <input type="url" name="lien" size="55" value="<?php echo $url ?>" id="lien" name="url" /></br>
        <label for="title">Titre</label>
        <input type="text" name="titre" id="title" size="70" value="<?php echo $titre ?>"/></br>
        <label for="describ">Description</label></br>
        <textarea cols="55" rows="10" name="description" id="describ" value="<?php echo $description ?>"/><?php echo $description ?></textarea></br>
        <?php if(isset($images)): ?>
        <?php for($i=0; $i<count($images); ++$i):?>
            <div class="images">
                <input type="radio" name="image" value="<?php echo $images[$i]; ?>" />
                <p><?php echo img($images[$i]); ?></p>
            </div>
        <?php endfor; ?>
        <?php else: ?>
             <div class="images">
                <p><?php echo img(base_url('web/img/no-pre.png')); ?></p>
            </div>
           <?php endif; ?>

        <input type="submit" name="envoyer" value="Ajouter le lien">

        <input type="hidden" name="membre" value="<?php echo $membre->id_membre; ?>"/>
        </form>
    </div>
</div>