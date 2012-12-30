<div class="content">
    <header>
        <h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>

        <h2>Hello <?php echo $membre->pseudo; ?>, que veux-tu partager?</h2>

        <p class="logOff"><?php echo anchor('membre/unlogin', 'Se déconnecter'); ?></p>
    </header>
    <section>
        <?php
        echo form_open('post/ajouter', array('method' => 'post', 'class' => 'lien'));
        $lienInput = array('name' => 'lien', 'placeholder' => 'Ton lien');
        echo form_input($lienInput);
        echo form_submit('Partager', 'Partager ce lien');
        echo form_close();
        ?>
    </section>
    <section>
        <?php if (count($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <article>
                <h2 class="pseudo icon-comment"><?php echo $post->pseudo; ?> </h2>

                <p><?php echo $post->commentaire; ?></p>

                <div class="infoSite">
                    <p class="site"><?php echo anchor($post->lien, $post->titre, array('title' => $post->titre, 'alt' => $post->titre)); ?></p>

                    <p class="propos"><?php echo $post->description; ?></p>

                    <p class="image"><?php echo anchor($post->lien, img($post->image), array('title' => $post->titre, 'alt' => $post->titre)); ?></p>
                </div>
                <?php if ($membre->pseudo == $post->pseudo): ?>
                <div class="modifier">
                    <p class="icon-cancel"><?php echo anchor("post/delete/" . $post->id_post, 'Supprimer le post', array('class' => 'delete')); ?></p>

                    <p class="icon-pencil-alt"><?php echo anchor('post/voir/' . $post->id_post, 'Modifier le post'); ?></p>
                </div>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>