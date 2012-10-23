<div class="post">
    <h3><?php echo $post->pseudo; ?> a partagé le site: <?php echo $post->titre; ?></h3>
    <p><strong>Ce qu'en pense <?php echo $post->pseudo; ?> : </strong><?php echo $post->commentaire; ?></p>
    <p class="porpos"><strong>A propose du site: </strong><?php echo $post->description; ?></p>
    <p><?php echo anchor('post/modifier/'.$post->id_post, 'Modifier le commentaire et/ou la descrition'); ?></p>
    <p class="image"><?php echo img($post->image); ?></p>
    <p><?php echo anchor("post/delete/".$post->id_post, 'X', array('class'=>'delete')); ?></p>
</div>