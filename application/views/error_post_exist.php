<header>
    <h1><?php echo anchor("post/ajouter/", '"Partages tes sites!" le site communautaire de partage', array('title' => 'Retour sur la page d\'accueil')); ?></h1>
</header>
<section>
    <div class="error">
        <header>
            <h2>Le poste existe déjà</h2>
        </header>

        <p>Le poste que tu désires ajouter existe déjà, désolé!</p>

        <p><?php echo anchor("post/lister/", 'Retour sur la page d\'accueil', array('title' => 'Retour sur la page d\'accueil')); ?></p>
    </div>
</section>
