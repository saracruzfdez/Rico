<!-- Ici notre modèle de carte de recette résumée à afficher pour chaque recette sur la page Espace personnel : -->
<div class="col-sm-6 col-md-6 col-lg-4 nopadding">

<div class="card mb-3 ml-1 mr-1">

    <!-- if usuario conectado, ver recetas del usuario ? de todos ?? -->
    <a href="/PROJET%20PERSO/recipes/recipesDetail/recipesDetail.php?id=<?php echo ($recipe['id']); ?>"><img class="image-card" src="<?php echo $recipe['image']; ?>" alt="" width="100%" height="100%"></a>

    <div class="card-body">
        <h5 class="card-title"><?php echo ucfirst($recipe['title']); ?></h5>

        <?php foreach ($users as $user) : ?>

            <?php if ($user['id'] === $recipe['user_id']) { ?>
                <h6 class="card-title"> par <?php echo ($user['name']); ?></h6>
            <?php }

        endforeach;

        if ($recipe['user_id'] === NULL) { ?>
            <h6 class="card-title"> par : Ce user n'existe plus</h6>
        <?php } ?>

        <!-- Dans le lien "Voir recette" je spécifie un query parameter id qui correspond à la recette sur laquelle je me trouve depuis l'Espace personnel (requête HTTP) : -->
        <a href="/PROJET%20PERSO/recipes/recipesDetail/recipesDetail.php?id=<?php echo ($recipe['id']); ?>" class="btn btn-primary">Voir la recette</a>
    </div>

</div>

</div>