<header>
    <h1><?php echo anchor("post/ajouter/", '"Partages tes sites!" le site communautaire de partage', array('title' => 'Retour sur la page d\'accueil')); ?></h1>
</header>
<section>
    <div class="error">
        <header>
            <h2>Une erreur est survenue!</h2>
        </header>

        <p>Vous avez intégré un URL non valide</p>

        <p><?php echo anchor("post/ajouter/", 'Retour sur la page d\'accueil', array('title' => 'Retour sur la page d\'accueil')); ?></p>
    </div>
</section>