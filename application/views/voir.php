<div class="post">
    <p><?php echo anchor('membre/unlogin', 'Se déconnecter'); ?></p>
    <h2>Modifier le site partager: <?php echo $titre; ?></h2>
    <?php echo form_open('post/modifier') ?>
    <label for="comment">Ce que vous en pensez</label></br>
    <textarea cols="55" rows="10" id="comment" value="Commentaire" name="commentaire"><?php echo $commentaire; ?></textarea></br>
    <label for="describ">A propose du site:</label></br>
    <textarea cols="55" rows="10" name="description" id="describ" value="<?php echo $description ?>"/><?php echo $description ?></textarea></br>
    <input type="hidden" name="id_post" value="<?php echo $id_post ?>"/>

    <input type="submit" value="Modifier!"/>
    </form>
    <?php echo anchor("post/lister/", 'Retour sur a page d\'accueil'); ?>
</div>