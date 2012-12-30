<header>
    <h1>Création d'un membre du site "Partage ton site!"</h1>
</header>
<section>
    <div class="membre">
        <p>Tu désires partager tes sites avec la communauté de "Partage ton site"? Alors inscrit-toi, celà ne prend que quelques minutes
            et tu pourras partager ton avis sur les sites.</p>
        <?php
        echo form_open('membre/creer', array('method' => 'post', 'class' => 'formConnexion'));
        echo '<div class="ajoutInput">';
        $pseudoInput = array('name' => 'pseudo', 'id' => 'login', 'placeholder' => 'Ton pseudo');
        echo form_input($pseudoInput);
        echo '</div>';
        echo '<div class="ajoutInput">';
        $emailInput = array('name' => 'email', 'id' => 'email', 'placeholder' => 'Ton email');
        echo form_input($emailInput);
        echo '</div>';
        echo '<div class="ajoutInput">';
        $mdpInput = array('name' => 'mdp', 'id' => 'mdp', 'placeholder' => 'Ton mot de passe');
        echo form_password($mdpInput);
        echo '</div>';
        echo '<div class="boutton">';
        echo anchor('membre', form_button('Connexion', 'Déjà inscrit!'), array('title' => 'Retour sur la page de connection', 'alt' => 'Retour sur la page de connection'));
        echo form_submit('check', 'M\'inscrire!');
        echo '</div>';
        echo form_close();
        ?>
    </div>
</section>
