<body>
<div id="container">
    <h1>Contenu envoyé!!</h1>
    <h2>
        <?php echo $title; ?>
    </h2>

    <?php //echo validation_erros(); ?>

    <?php echo form_open('post/lister') ?>
    <label for="auteur">Pseudo</label>
    <input type="text" name="pseudo" value="pseudo" id="auteur"/ ></br>
    <label for="comment">Commentaire</label></br>
    <textarea cols="55" rows="10" id="comment" value="Commentaire" name="commentaire"></textarea></br>
    <label for="url">Lien à partager</label>
    <input type="url" name="lien" value="http://" id="url" /></br>
    <input type="submit" name="envoyer" value="Partager">
    </form>

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