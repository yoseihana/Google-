<div id="container">
    <h2>Connexion des membres</h2>
    <?php
    echo form_open('membre/login', array('method'=>'post'));
    echo form_label('adresse email', 'mail');
    $emailInput = array('name'=>'email', 'id'=>'email');
    echo form_input($emailInput);
    echo'<br/>';
    echo form_label('mot de passe', 'mdp');
    $mdpInput = array('name'=>'mdp', 'id'=>'mdp');
    echo form_password($mdpInput);
    echo '<br/>';
    echo form_submit('check', 'vérifier');
    echo form_close();
    ?>
</div>