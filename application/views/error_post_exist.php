<header>
    <h1><?php echo anchor("post/ajouter/", 'Partages Tes Sites le site communautaire de partage', array('title' => 'Retour sur la page d\'accueil')); ?></h1>
</header>
<section>
    <div class="error">
        <header>
            <h2>Une erreur est survenue&nbsp;!/h2>
        </header>

        <p>Le poste que tu désires ajouter existe déjà, désolé&nbsp;!</p>

        <p><?php echo anchor("post/lister/", 'Retour sur la page d\'accueil', array('title' => 'Retour sur la page d\'accueil')); ?></p>
    </div>
</section>
