<!-- Ici le formulaire pour créer une nouvelle recette -->

<div class="d-flex justify-content-center">

<div class="col-md-8 col-lg-8 nopadding">

<div class="container mb-3 mt-3">

    <form action="/PROJET%20PERSO/personalSpace/personalSpaceRecipeForm/personalSpaceRecipeForm.php" method="POST" id="personalSpaceRecipeCreate">

        <h3>Nouvelle recette</h3>

        <div class="form-group">
            <label for="title" class="form-label mt-2">Titre de votre recette :</label>
            <input class="form-control" name="title" type="text" id="title" minlength="5" maxlength="20" required>
        </div>

        <!-- Pour le message d'erreur dans la validation JS : -->
        <span id="titleError"></span>

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
            <input class="form-control" name="persons" type="number" id="persons" min="1" max="20" required>
        </div>

         <!-- Pour le message d'erreur dans la validation JS : -->
         <span id="personsError"></span>

        <div class="form-group">
            <label for="time" class="form-label mt-2">Temps :</label>
            <input class="form-control" name="time" type="number" id="time" min="1" max="120" required>
        </div>

         <!-- Pour le message d'erreur dans la validation JS : -->
         <span id="timeError"></span>
        
        <div class="form-group">
            <label for="ingredients" class="form-label mt-2">Ingredients :</label>
            <textarea class="form-control" name="ingredients" type="text" id="ingredients" rows="3" min="20" max="2500" required></textarea>
        </div>

         <!-- Pour le message d'erreur dans la validation JS : -->
         <span id="ingredientsError"></span>

        <div class="form-group">
            <label for="recipe" class="form-label mt-2">Recette : </label>
            <textarea class="form-control" name="recipe" type="text" id="recipe" rows="3" min="20" max="2500" required></textarea>
        </div>

          <!-- Pour le message d'erreur dans la validation JS : -->
          <span id="recipeError"></span>

        <div class="form-group">
            <label for="img" class="form-label mt-2">Image (Entrez l'adresse de votre image) : </label>
            <textarea placeholder="https://example.com" class="form-control" name="image" type="text" id="img" rows="3" required></textarea>
        </div>

          <!-- Pour le message d'erreur dans la validation JS : -->
          <span id="imageError"></span>

        <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>

    </form>

</div>

</div>

</div>
