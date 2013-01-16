<header>
    <h1><?php echo anchor("membre/ajoutermembre/", 'Partages Tes Sites le site communautaire de partage', array('title' => 'Retour sur la page d\'inscription')); ?></h1>
</header>

<section>
    <div class="error">
        <header>
            <h2>Une erreur est survenue&nbsp;!</h2>
        </header>
        <p>Une erreur est survenue lors de l'inscription, le pseudo contient des caractère qui ne sont pas acceptés. Le pseudo doit être de minimum 2 caractères allant de a-z, A-Z, 0-9 et des caractères spéciaux tels que: _, +, -, $, *, @, #, `</p>

        <p><?php echo anchor("membre/ajoutermembre/", 'Retour sur la page d\'inscription', array('title' => 'Retour sur la page d\'inscription')); ?></p>
    </div>
</section>