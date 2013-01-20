<header>
    <h1>Connexion des membres du site Partages Tes Sites</h1>
</header>
<section>
    <div class="membre">
        <p>Bienvenu sur Partages Tes Sites, site communautaire de partage de sites. Pour acceder au réseau, merci de te connecter avec votre login et ton mot de passe.</p>
        <?php
        echo form_open('membre/login', array('method' => 'post', 'class' => 'formConnexion'));
        echo '<div class="ajoutInput">';
        $emailInput = array('name' => 'email', 'id' => 'email', 'placeholder' => 'Ton email');
        echo form_input($emailInput);
        echo '</div>';
        echo '<div class="ajoutInput">';
        $mdpInput = array('name' => 'mdp', 'id' => 'mdp', 'placeholder' => 'Ton mot de passe');
        echo form_password($mdpInput);
        echo '</div>';
        echo '<div class="boutton">';
        echo anchor('membre/ajoutermembre', 'M\'inscrire&nbsp;', array('title' => 'Création d\'un nouveau compte'));
        echo form_submit('check', 'Vérifier');
        echo '</div>';
        echo form_close();
        ?>
    </div>
</section>
