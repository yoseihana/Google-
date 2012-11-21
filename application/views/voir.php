<h1>Modifier le site partagé: <?php echo $titre; ?></h1>
<div class="postModifcation">
    <p class="logOff"><?php echo anchor('membre/unlogin', 'Se déconnecter'); ?></p>
    <p>Tu désires modifier une information sur ton post?</p>
    <?php
    echo form_open('post/modifier', array('method'=>'post'));
    echo '<div class="bouton">';
    echo form_label('Modification de ton commentaire', 'commentaire');
    $commentaireText = array('name'=>'commentaire', 'value'=> $commentaire, 'cols'=>'54', 'rows'=>'5', 'id'=>'commentaire');
    echo form_textarea($commentaireText);
    echo '</div>';
    echo '<div class="bouton">';
    echo form_label('Modification de la déscription du site', 'description');
    $descriptionText = array('name'=>'description', 'value'=> $description, 'cols'=>'54', 'rows'=>'5', 'id'=>'description');
    echo form_textarea($descriptionText);
    echo '</div>';
    echo form_hidden('id_post', $id_post);
    echo form_submit('Modifier', 'Modifier!');
    echo form_button('Retour', anchor('post/lister', 'Retour', array('title'=>'Retour sur a page d\'accueil', 'alt'=>'Retour sur a page d\'accueil')));
    echo form_close();
    ?>
</div>