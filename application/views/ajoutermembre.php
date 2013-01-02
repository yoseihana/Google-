<header>
    <h1><?php echo anchor("membre", 'Création d\'un membre du site "Partages tes sites!"', array('title' => 'Retour sur la page de connection')); ?></h1>
</header>
<section>
    <div class="membre">
        <p>Tu désires partager tes sites avec la communauté de "Partages tes sites"? Alors inscrit-toi, celà ne prend que quelques minutes
            et tu pourras partager ton avis sur les sites.</p>
        <?php
        echo form_open('membre/creer', array('method' => 'post', 'class' => 'formConnexion'));
        echo '<div class="ajoutInput">';
        $pseudoInput = array('name' => 'pseudo', 'id' => 'pseudo', 'placeholder' => 'Ton pseudo');
        echo form_input($pseudoInput);
        echo '</div>';
        echo '<p>Le pseudo ne doit doit être minimum de 2 caractères allant de a-z, A-Z, 0-9 et des caractères spéciaux tels que: _, +, -, $, *, @, #, `</p>';
        echo '<div class="ajoutInput">';
        $emailInput = array('name' => 'email', 'id' => 'email', 'placeholder' => 'Ton email');
        echo form_input($emailInput);
        echo '</div>';
        echo '<div class="ajoutInput">';
        $mdpInput = array('name' => 'mdp', 'id' => 'mdp', 'placeholder' => 'Ton mot de passe');
        echo form_password($mdpInput);
        echo '</div>';
        echo '<p>Le mot de passe doit contenir entre 4 et 12 caractères</p>';
        echo '<div class="boutton">';
        echo anchor('membre', form_button('Connexion', 'Déjà inscrit!'), array('title' => 'Retour sur la page de connection'));
        echo form_submit('check', 'M\'inscrire!');
        echo '</div>';
        echo form_close();
        ?>
    </div>
</section>
