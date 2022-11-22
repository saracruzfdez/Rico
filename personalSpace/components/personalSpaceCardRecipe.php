<!-- Ici notre modèle de carte de recette résumée à afficher pour chaque recette sur la page Espace personnel : -->
<div class="card mb-3">

    <a href="/PROJET%20PERSO/personalRecipe/personalRecipe.php?id=<?php echo ($recipe['id']); ?>"><img class="image-card" src="<?php echo $recipe['image']; ?>" alt="" width="100%" height="100%"></a>

    <div class="card-body">
        <h5 class="card-title"><?php echo ucfirst($recipe['title']); ?></h5>

        <h6 class="card-title">par <?php echo ($recipe['user_id']) ?></h6>

        <!-- Dans le lien "Voir recette" je spécifie un query parameter id qui correspond à la recette sur laquelle je me trouve depuis l'Espace personnel (requête HTTP) : -->
        <a href="/PROJET%20PERSO/personalRecipe/personalRecipe.php?id=<?php echo ($recipe['id']); ?>" class="btn btn-primary">Voir la recette</a>
    </div>

</div>  