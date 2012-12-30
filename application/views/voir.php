<div class="content">
    <header>
        <h1><?php echo anchor(base_url('index.php/post/lister'), 'Modifier le site partagé"!', array('title' => 'Accueil du site de partage')); ?></h1>

        <h2><?php echo $titre; ?></h2>

        <p class="logOff"><?php echo anchor('membre/unlogin', 'Se déconnecter'); ?></p>
    </header>
    <section>
        <div class="sectionContent">
            <p>Tu désires modifier une information sur ton post?</p>
            <?php
            echo form_open('post/modifier', array('method' => 'post'));
            echo '<div class="ajoutTextarea">';
            echo form_label('Modification de ton commentaire', 'commentaire');
            $commentaireText = array('name' => 'commentaire', 'value' => $commentaire, 'cols' => '54', 'rows' => '5', 'id' => 'commentaire');
            echo form_textarea($commentaireText);
            echo '</div>';
            echo '<div class="ajoutTextarea">';
            echo form_label('Modification de la déscription du site', 'description');
            $descriptionText = array('name' => 'description', 'value' => $description, 'cols' => '54', 'rows' => '5', 'id' => 'description');
            echo form_textarea($descriptionText);
            echo '</div>';
            echo'<div class="boutton">';
            echo form_hidden('id_post', $id_post);
            echo  anchor('post/lister', form_button('Retour','Retour'), array('title' => 'Retour sur a page d\'accueil', 'alt' => 'Retour sur a page d\'accueil'));
            echo form_submit('Modifier', 'Modifier!');
            echo '</div>';
            echo form_close();
            ?>
        </div>
    </section>
</div>