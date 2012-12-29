<h1>Création d'un membre</h1>
<div id="membre">
    <p>Tu désires partager tes sites avec la communauté de "Partage ton site"? Alors inscrit-toi, celà ne prend quelques minutes
        et tu pourras partager ton avis sur les sites.</p>
    <?php
    echo form_open('membre/creer', array('method'=>'post'));
    echo '<div class="bouton">';
    $pseudoInput = array('name'=>'pseudo', 'id'=>'login', 'placeholder'=>'Ton pseudo');
    echo form_input($pseudoInput);
    echo '</div>';
    echo '<div class="bouton">';
    $emailInput = array('name'=>'email', 'id'=>'email', 'placeholder'=>'Ton email');
    echo form_input($emailInput);
    echo '</div>';
    echo '<div class="bouton">';
    $mdpInput = array('name'=>'mdp', 'id'=>'mdp','placeholder'=>'Ton mot de passe');
    echo form_password($mdpInput);
    echo '</div>';
    echo form_submit('check', 'M\'inscrire!');
    echo form_button('Connexion', anchor('membre', 'Déjà inscrit!', array('title'=>'Retour sur la page de connection', 'alt'=>'Retour sur la page de connection')));
    echo form_close();
    ?>
</div>