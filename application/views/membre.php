<div id="membre">
    <h2>Connexion des membres</h2>
    <p>Bonjour et bienvenu sur "Partage ton site", site communautaire de partage de site. Pour acceder au site, merci de vous connecter avce votre login et mot de passe.</p>
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
    echo form_submit('check', 'vérifier');
    echo form_close();
    ?>
</div>