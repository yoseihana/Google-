<div id="container">
	<h1><?php echo anchor(base_url('index.php/post/lister'), 'Bienvenue sur le site communautaire "Partage tes sites"!', array('title'=>'Accueil du site de partage')); ?></h1>
    <div class="post">
        <h2 class="ajout">Veux-tu partager ce site, <?php echo $membre->pseudo; ?>? <?php echo anchor($url, $url, array('title'=>'Aller sur le site '.$url, 'alt'=>'Aller sur le site '.$url)); ?></h2>
    <?php
    echo form_open('post/creer', array('method'=>'post'));
    echo '<div class="bouton">';
    $commentaireText = array('name'=>'commentaire', 'placeholder'=> 'Ton commentaire', 'cols'=>'55', 'rows'=>'5', 'id'=>'commentaire');
    echo form_textarea($commentaireText);
    echo '</div>';
    echo '<div class="bouton">';
    $titreInput = array('name'=>'titre', 'id'=>'title', 'value'=> $titre, 'class'=>'formAjout');
    echo form_input($titreInput);
    echo '</div>';
    echo '<div class="bouton">';
    $descriptionText = array('name'=>'description', 'value'=> $description, 'cols'=>'55', 'rows'=>'5', 'id'=>'description');
    echo form_textarea($descriptionText);
    echo '</div>';
     ?>
    <div class="images">
     <?php if(isset($images)): ?>
        <?php for($i=0; $i<count($images); ++$i):?>
            <div class="inputImg">
                <input type="radio" name="image" value="<?php echo $images[$i]; ?>" <?php echo set_radio('image', $images[$i]); ?>  />
                <p><?php echo img($images[$i]); ?></p>
            </div>
            <?php endfor; ?>
    <?php endif; ?>
    </div>
        <div class="boutton">
    <?php echo form_hidden('membre', $membre->id_membre);
        echo form_hidden('lien', $url);
        echo form_submit('Envoyer', 'Ajouter ce lien!');
        echo form_button('Retour', anchor('post/lister', 'Retour', array('title'=>'Retour sur a page d\'accueil', 'alt'=>'Retour sur a page d\'accueil')));
    echo form_close();
    ?>
    </div>
    </div>
</div>