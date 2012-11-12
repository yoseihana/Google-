<div id="membre">
    <h1>Connexion des membres</h1>
    <p>Bonjour et bienvenu sur "Partage ton site", site communautaire de partage de site. Pour acceder au site, merci de vous connecter avec votre login et mot de passe.</p>
    <?php
    echo form_open('membre/login', array('method'=>'post'));
    echo form_label('Adresse email:', 'mail');
    $emailInput = array('name'=>'email', 'id'=>'email');
    echo form_input($emailInput);
    echo'<br/>';
    echo form_label('Mot de passe:', 'mdp');
    $mdpInput = array('name'=>'mdp', 'id'=>'mdp');
    echo form_password($mdpInput);
    echo '<br/>';
    echo form_submit('check', 'Vérifier');
    echo form_close();
    ?>
    <p><?php echo anchor('membre/ajoutermembre', 'Créer un compte'); ?></p>
</div>