<header>
    <h1>Connexion des membres du site "Partage ton site!"</h1>
</header>
<section>
    <div class="membre">
        <p>Bienvenu sur "Partage ton site", site communautaire de partage de site. Pour acceder au réseau, merci de te connectez avec votre login et votre mot de passe.</p>
        <?php
        echo form_open('membre/login', array('method' => 'post', 'class' => 'formConnexion'));
        echo '<div class="ajoutInput">';
        $emailInput = array('name' => 'email', 'id' => 'email', 'placeholder' => 'Votre email', 'class' => 'icon-mail');
        echo form_input($emailInput);
        echo '</div>';
        echo '<div class="ajoutInput">';
        $mdpInput = array('name' => 'mdp', 'id' => 'mdp', 'class' => 'icon-lock', 'placeholder' => 'Votre mot de passe');
        echo form_password($mdpInput);
        echo '</div>';
        echo '<div class="boutton">';
        echo anchor('membre/ajoutermembre', form_button('Connexion', 'M\'inscrire!'), array('title' => 'Création d\'un nouveau compte', 'alt' => 'Création d\'un nouveau compte'));;
        echo form_submit('check', 'Vérifier', 'icon-lock');
        echo '</div>';
        echo form_close();
        ?>
    </div>
</section>
