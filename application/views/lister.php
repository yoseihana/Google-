<div id="container">
    <h1>Bienvenue sur le site communautaire "Partage tes sites"!</h1>
    <div class="form">
        <h2>Hello <?php echo $membre->pseudo; ?>, que veux-tu partager?</h2>
        <p class="logOff"><?php echo anchor('membre/unlogin', 'Se déconnecter'); ?></p>
        <?php
        echo form_open('post/ajouter', array('method'=>'post', 'class'=>'lien'));
        echo '<div class="bouton">';
        $lienInput = array('name'=>'lien', 'value'=>'Ton lien');
        echo form_input($lienInput);
        echo form_submit('Partager', 'Partager ce lien');
        echo '</div>';
        echo form_close();
        ?>
    </div>
    <div class="postList">
        <?php if(count($posts)): ?>
        <?php foreach($posts as $post): ?>
            <div class="post">
                <h2 class="pseudo icon-comment"><?php echo $post->pseudo; ?> </h2>
                <p><?php echo $post->commentaire; ?></p>
                <div class="infoSite">
                    <p class="site"><?php echo anchor($post->lien, $post->titre, array('title'=>$post->titre, 'alt'=>$post->titre)); ?></p>
                    <p class="propos"><?php echo $post->description; ?></p>
                    <p class="image"><?php echo anchor($post->lien, img($post->image), array('title'=>$post->titre, 'alt'=>$post->titre)); ?></p>
                </div>
                <?php if($membre->pseudo == $post->pseudo): ?>
                    <div class="modifier">
                        <p class="icon-cancel"><?php echo anchor("post/delete/".$post->id_post, 'Supprimer le post', array('class'=>'delete')); ?></p>
                        <p class="icon-pencil-alt"><?php echo anchor('post/voir/'.$post->id_post, 'Modifier le post'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>