<!-- This is the page to edit a category : -->
<?php
// Here i call the sql.php component in order to use the selectCategoryById() fonction :
require_once  __DIR__ . "/../../../globalComponents/sql.php";

$category = selectCategoryById(($_GET['id'])) ?>

<!-- If $category returns something show it in this model card, else show a message "categorie inexistente" : -->
<?php
if (isset($category)) { ?>
    <div class="d-flex justify-content-center">
        <div class="col-md-8 col-lg-8 nopadding">
            <div class="container mb-3 mt-3">
                
                <!-- here tha edit category form -->
                <form action="/PROJET%20PERSO/categories/categoriesFormEdit/categoriesFormEdit.php" method="POST">
                    <h3>Modifier la categorie</h3>
                    <div class="form-group">
                        <label for="name" class="form-label mt-2">Nom :</label>
                        <input class="form-control" name="name" type="text" id="name" value="<?php echo $category['name'] ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $category['id'] ?>" required>
                    <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                </form>

            </div>
        </div>
    </div>

<?php } else { ?>
    <div class="image-component">

        <div class="text">
            <p>Cette catégorie n'existe pas !</p>
        </div>
        <div class="image">
            <img src="https://images.unsplash.com/photo-1561380851-39b27c4f1626?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
        </div>

    </div>
<?php };