<div class="content">
    <header>
        <h1><?php echo anchor(base_url('index.php/post/lister'), 'Partager un site sur "Partages tes sites"!', array('title' => 'Accueil du site de partages')); ?></h1>

        <h2>Veux-tu partager ce site, <?php echo $membre->pseudo; ?>? <?php echo anchor($url, $url, array('title' => 'Aller sur le site ' . $url)); ?></h2>

        <p class="logOff"><?php echo anchor('membre/unlogin', 'Se déconnecter'); ?></p>
    </header>
    <section>
        <div class="sectionContent">
            <?php
            echo form_open('post/creer', array('method' => 'post'));
            echo '<div class="ajoutTextarea">';
            $commentaireText = array('name' => 'commentaire', 'placeholder' => 'Ton commentaire', 'cols' => '55', 'rows' => '5', 'id' => 'commentaire');
            echo form_textarea($commentaireText);
            echo '</div>';
            echo '<div  class="ajoutInput">';
            $titreInput = array('name' => 'titre', 'id' => 'title', 'value' => $titre, 'class' => 'formAjout');
            echo form_input($titreInput);
            echo '</div>';
            echo '<div  class="ajoutTextarea">';
            $descriptionText = array('name' => 'description', 'value' => $description, 'cols' => '55', 'rows' => '5', 'id' => 'description');
            echo form_textarea($descriptionText);
            echo '</div>';
            ?>
            <div class="images">
                <?php if (isset($images)): ?>
                <?php for ($i = 0; $i < count($images); ++$i): ?>
                    <div class="inputImg">
                        <input type="radio" id="<?php echo $i; ?>" name="image" value="<?php echo $images[$i]; ?>" <?php echo set_radio('image', $images[$i]); ?>  />

                        <label for="<?php echo $i; ?>" ><?php echo img($images[$i]); ?></label>
                    </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
            <div class="boutton">
                <?php echo form_hidden('membre', $membre->id_membre);
                echo form_hidden('lien', $url);
                echo anchor('post/lister', form_button('Retour', 'Retour'), array('title' => 'Retour sur a page d\'accueil'));
                echo form_submit('Envoyer', 'Ajouter ce lien!');
                echo form_close();
                ?>
            </div>
        </div>
    </section>
</div>
