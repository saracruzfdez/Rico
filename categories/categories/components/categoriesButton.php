<!-- Here we have the "buttons" card where i can edit or delete a category : -->
<div class="col-sm-6 col-md-6 col-lg-4 nopadding">
    <div class="card mb-3 ml-1 mr-1">
        <div class="card-body">

            <!-- This is the link button that on click show us all the recipes from the current category. I send the current category_id using query string from the HTTP request : -->
            <a href="/PROJET%20PERSO/categories/categoriesDetail/categoriesDetail.php?id=<?php echo ($category['id']); ?>" class="btn btn-outline-primary mt-3"><?php echo ($category['name']); ?></a>
            <div class="mt-3">
                <div class="button">
                    <!-- HERE IS THE LINK "Modifier catégorie" WHERE I send the category_id with the query parameters from the HTTP request : -->
                    <a href="/PROJET%20PERSO/categories/categoriesEdit/categoriesEdit.php?id=<?php echo ($category['id']); ?>" class="btn btn-primary">Editer catégorie</a>
                </div>
                <div class="button">
                    <!-- HERE IS THE LINK "Supprimer catégorie" WHERE I send the category_id with the query parameters from the HTTP request : -->
                    <a href="/PROJET%20PERSO/categories/categoriesDelete/categoriesDelete.php?id=<?php echo ($category['id']); ?>" class="btn btn-primary">Supprimer catégorie</a>
                </div>
            </div>

        </div>
    </div>
</div>