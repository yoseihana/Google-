<div id="membre">
    <h1>S'enregistrer en tant que membre dans "Partage ton site"</h1>
    <p>Vous désirez partagez vos liens avec la communauté "Partage ton site"?</p>
    <p>Alors inscrivez-vous, celà ne prend quelques minutes et vous pourrez ainsi partager votre avis sur les sites.</p>
    <?php
    echo form_open('membre/creer', array('method'=>'post'));
    echo form_label('Pseudo:', 'login');
    $pseudoInput = array('name'=>'pseudo', 'id'=>'login');
    echo form_input($pseudoInput);
    echo'<br/>';
    echo form_label('Adresse email:', 'mail');
    $emailInput = array('name'=>'email', 'id'=>'email');
    echo form_input($emailInput);
    echo'<br/>';
    echo form_label('Mot de passe:', 'mdp');
    $mdpInput = array('name'=>'mdp', 'id'=>'mdp');
    echo form_password($mdpInput);
    echo '<br/>';
    echo form_submit('check', 'Créer mon compte');
    echo form_close();
    ?>
    <p><?php echo anchor('membre', 'Retour sur la page de connexion'); ?></p>
</div>