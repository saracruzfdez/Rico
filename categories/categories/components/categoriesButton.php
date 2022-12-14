<!-- Ici notre button de categories à afficher pour chaque categorie sur la page cat : -->

<!-- Dans le lien "Modifier cat" je spécifie un query parameter id qui correspond a la cat sur laquelle je me trouve depuis la page cat (requête HTTP) : -->
<div class="card mb-3">

    <div class="card-body">

        <a href="/PROJET%20PERSO/categories/categoriesDetail/categoriesDetail.php?id=<?php echo ($category['id']); ?>" class="btn btn-outline-primary mt-3"><?php echo ($category['name']); ?></a>

        <div class="mt-3">
            <div class="button">
                <!-- Dans le lien "Modifier cat" je spécifie un query parameter id qui correspond a la cat sur laquelle je me trouve depuis la page cat (requête HTTP) : -->
                <a href="/PROJET%20PERSO/categories/categoriesEdition/categoriesEdition.php?id=<?php echo ($category['id']); ?>" class="btn btn-primary">Editer categorie</a>
            </div>

            <div class="button">
                <!-- Dans le lien "Modifier cat" je spécifie un query parameter id qui correspond a la cat sur laquelle je me trouve depuis la page cat (requête HTTP) : -->
                <a href="/PROJET%20PERSO/categories/categoriesDelete/categoriesDelete.php?id=<?php echo ($category['id']); ?>" class="btn btn-primary">Supprimer categorie</a>
            </div>
        </div>

    </div>

</div>