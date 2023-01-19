<!-- Page du detail de édition de la recette -->
<?php
// On inclut la connexion à la base :
require_once  __DIR__ . "/../../../globalComponents/sql.php";

// On stocke le résultat dans un tableau (je récupère tout le contenu du tableau avec fetchAll()) :
$recipe = selectRecipeById($_GET['id'])

?>

<!-- Si le résultat de la requête existe (isset) et qu'il n'est pas vide (car recette qui n'existe pas par exemple) alors affiche le détail, sinon message "Recette inexistante" : -->
<?php
if (isset($recipe)) { ?>

    <!-- Ici le formulaire pour modifier une recette -->
    <div class="d-flex justify-content-center">


        <div class="col-md-8 col-lg-8 nopadding">


            <div class="container mt-3">

                <form action="/PROJET%20PERSO/personalSpace/personalSpaceRecipeFormEdit/personalSpaceRecipeFormEdit.php" method="POST">

                    <h3>Modifier votre recette</h3>

                    <div class="form-group">
                        <label for="title" class="form-label mt-2">Titre de votre recette :</label>
                        <input class="form-control" name="title" type="text" id="title" value="<?php echo $recipe['title'] ?>" required>
                    </div>

                    <div class="form-group">

                        <label for="category_id" class="form-label mt-2">Categorie :</label>

                        <select name="category_id" id="category_id" required>
                            <option value="">Coisissez une categorie</option>
                            <option value="1">Entrées</option>
                            <option value="2">Plats</option>
                            <option value="3">Desserts</option>
                            <option value="4">Boissons</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="persons" class="form-label mt-2">Nombre de personnes :</label>
                        <input class="form-control" name="persons" type="number" id="persons" min="1" max="20" value="<?php echo $recipe['persons'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="time" class="form-label mt-2">Temps :</label>
                        <input class="form-control" name="time" type="number" id="time" min="1" max="120" value="<?php echo $recipe['time'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="ingredients" class="form-label mt-2">Ingredients :</label>
                        <input class="form-control" name="ingredients" type="text" id="ingredients" min="1" max="3000" value="<?php echo $recipe['ingredients'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="recipe" class="form-label mt-2">Recette :</label>
                        <input class="form-control" name="recipe" type="text" id="recipe" min="1" max="3000" value="<?php echo $recipe['recipe'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="img" class="form-label mt-2">Image (Entrez l'adresse de votre image) :</label>
                        <input class="form-control" name="image" type="text" id="img" min="1" max="3000" value="<?php echo $recipe['image'] ?>" required>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $recipe['id'] ?>" required>

                    <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>

                </form>

            </div>

        </div>

    </div>

<?php } else { ?>

    <div class="image-component">

        <div class="text">
            <p>Cette recette n'existe pas !</p>
        </div>

        <div class="image">
            <img src="https://images.unsplash.com/photo-1506159904226-d6cfd457c30c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
        </div>

    </div>

<?php }
