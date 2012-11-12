<div class="post">
    <h2>Modifier le site partager: <?php echo $post[0]->titre; ?></h2>
    <?php echo form_open('post/modifier') ?>
    <label for="comment">Ce que vous en pensez</label></br>
    <textarea cols="55" rows="10" id="comment" value="Commentaire" name="commentaire"><?php echo $post[0]->commentaire; ?></textarea></br>
    <label for="describ">A propose du site:</label></br>
    <textarea cols="55" rows="10" name="description" id="describ" value="<?php echo $post[0]->description ?>"/><?php echo $post[0]->description ?></textarea></br>
    <input type="hidden" name="id_post" value="<?php echo $post[0]->id_post ?>"/>

    <input type="submit" value="Modifier!"/>
    </form>
    <?php echo anchor("post/lister/", 'Retour sur a page d\'accueil'); ?>
</div>