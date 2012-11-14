<h1>Connexion des membres</h1>
<div id="membre">
    <p>Bienvenu sur "Partage ton site", site communautaire de partage de site. Pour acceder au réseau, merci de te connectez avec votre login et votre mot de passe.</p>
    <?php
    echo form_open('membre/login', array('method'=>'post'));
    echo '<div class="bouton">';
    $emailInput = array('name'=>'email', 'id'=>'email','value'=>'Ton email', 'class'=>'icon-mail');
    echo form_input($emailInput);
    echo '</div>';
    echo '<div class="bouton">';
    $mdpInput = array('name'=>'mdp', 'id'=>'mdp', 'value'=>'Mot de passe', 'class'=>'icon-lock');
    echo form_password($mdpInput);
    echo '</div>';
    echo form_submit('check', 'Vérifier', 'icon-lock');
    echo form_button('Connexion', anchor('membre/ajoutermembre', 'M\'inscrire!', array('title'=>'Création d\'un nouveau compte', 'alt'=>'Création d\'un nouveau compte')));
    echo form_close();
    ?>
</div>