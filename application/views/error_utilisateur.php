<header>
    <h1><?php echo anchor("post", '"Partages tes sites!" le site communautaire de partage', array('title' => 'Retour sur la page de connection')); ?></h1>
</header>
<section>
    <div class="error">
        <header>
            <h2>Une erreur est survenue!</h2>
        </header>

        <p>Vous avez intégré une mauvaise adresse email ou un mauvais mot de passe</p>

        <p><?php echo anchor("post/", 'Retour sur la page de connection', array('title' => 'Retour sur la page de connection')); ?></p>
    </div>
</section>
