<header>
    <h1><?php echo anchor("membre/ajoutermembre/", '"Partages tes sites!" le site communautaire de partage', array('title' => 'Retour sur la page d\'inscription')); ?></h1>
</header>

<section>
    <div class="error">
        <header>
            <h2>Une erreur est survenue!</h2>
        </header>
        <p>Une erreur est survenue lors de l'inscription, le mot de passe n'est pas valide. Celui-ci doit contenir minimum 4 caractères et maximum 12 caractères.</p>

        <p><?php echo anchor("membre/ajoutermembre/", 'Retour sur la page d\'inscription', array('title' => 'Retour sur la page d\'inscription')); ?></p>
    </div>
</section>