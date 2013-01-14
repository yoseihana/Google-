<header>
    <h1>Connexion des membres du site "Partages tes sites!"</h1>
</header>
<section>
    <div class="membre">
        <p>Bienvenu sur "Partages tes sites", site communautaire de partage de sites. Pour acceder au réseau, merci de te connectez avec votre login et votre mot de passe.</p>
        <?php
        echo form_open('membre/login', array('method' => 'post', 'class' => 'formConnexion'));
        echo '<div class="ajoutInput">';
        $emailInput = array('name' => 'email', 'id' => 'email', 'placeholder' => 'Votre email');
        echo form_input($emailInput);
        echo '</div>';
        echo '<div class="ajoutInput">';
        $mdpInput = array('name' => 'mdp', 'id' => 'mdp', 'placeholder' => 'Votre mot de passe');
        echo form_password($mdpInput);
        echo '</div>';
        echo '<div class="boutton">';
        echo anchor('membre/ajoutermembre', form_button('Connexion', 'M\'inscrire!'), array('title' => 'Création d\'un nouveau compte'));;
        echo form_submit('check', 'Vérifier');
        echo '</div>';
        echo form_close();
        ?>
    </div>
</section>
