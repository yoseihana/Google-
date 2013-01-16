<div class="content">
    <header>
        <hgroup>
            <h1><?php echo anchor(base_url('index.php/post/lister'), 'Bienvenue sur le site communautaire Partages Tes Sites', array('title' => 'Accueil du site de partages')); ?></h1>

            <h2>Hello <?php echo $membre->pseudo; ?>, que veux-tu partager?</h2>

            <p class="logOff"><?php echo anchor('membre/unlogin', 'Se déconnecter'); ?></p>
        </hgroup>
    </header>
    <section>
        <?php
        echo form_open('post/ajouter', array('method' => 'post', 'class' => 'lien'));
        $lienInput = array('name' => 'lien', 'placeholder' => 'Ton lien');
        echo form_input($lienInput);
        echo form_submit('Partager', 'Partager ce lien');
        echo form_close();
        ?>
    </section>
    <section itemscope itemtype="http://schema.org/ItemList">
        <meta itemprop="mainContentOfPage" content="true"/>
        <?php if (count($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <article class="vcard" itemprop="itemListElement" itemscope itemtype="http://schema.org/Article">
                <h2 class="pseudo icon-comment fn" itemprop="author"><?php echo $post->pseudo; ?> </h2>

                <p itemprop="about" ><?php echo $post->commentaire; ?></p>

                <div class="infoSite">
                    <p class="site url" itemprop="url" ><?php echo anchor($post->lien, $post->titre, array('title' => $post->titre)); ?></p>

                    <p class="propos"><?php echo $post->description; ?></p>

                    <p class="image" itemprop="image" ><?php
                        $img_prop = array(
                            'src' => $post->image,
                            'alt' => $post->titre,
                            'title' => $post->titre,
                        );
                        echo anchor($post->lien, img($img_prop), array('title' => $post->titre)); ?></p>

                </div>
                <?php if ($membre->pseudo == $post->pseudo): ?>
                <div class="modifier">
                    <p class="icon-cancel"><?php echo anchor('post/delete/' . $post->id_post, 'Supprimer le post', array('title' => 'Modification du post', 'class' => 'delete')); ?></p>

                    <p class="icon-pencil-alt"><?php echo anchor('post/voir/' . $post->id_post, 'Modifier le post', array('title' => 'Suppression du post')); ?></p>
                </div>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        <?php endif; ?>
        <footer class="postFooter">
            <p><?php echo $links ?></p>
        </footer>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url('web/js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('web/js/javascript.js'); ?>"></script>