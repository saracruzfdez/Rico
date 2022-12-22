<!-- Ici notre modèle de carte de recette résumée à afficher pour chaque recette sur la page d'accueil : -->
<div class="card mb-3">

    <a href="/PROJET%20PERSO/recipes/recipesDetail/recipesDetail.php?id=<?php echo ($recipe['id']); ?>"><img class="image-card" src="<?php echo $recipe['image']; ?>" alt="" width="100%" height="100%"></a>

    <div class="card-body">
        <h5 class="card-title"><?php echo ucfirst($recipe['title']); ?></h5>

        <?php foreach ($name as $n) : ?>
            <?php if ($n['id'] === $recipe['user_id']) { ?>

                <h6 class="card-title"> par <?php echo ($n['name']); ?></h6>

            <?php }
        endforeach;

        if ($recipe['user_id'] === NULL) { ?>

            <h6 class="card-title"> par : Ce user n'existe plus !</h6>

        <?php } ?>

        <!-- Dans le lien "Voir recette" je spécifie un query parameter id qui correspond à la recette sur laquelle je me trouve depuis l'accueil (requête HTTP) : -->
        <a href="/PROJET%20PERSO/recipes/recipesDetail/recipesDetail.php?id=<?php echo ($recipe['id']); ?>" class="btn btn-primary">Voir la recette</a>
    </div>

</div>