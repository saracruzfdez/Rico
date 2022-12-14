<!-- Ici le formulaire pour créer une nouvelle recette -->
<div class="container mb-3 mt-2">

    <form action="/PROJET%20PERSO/personalSpaceRecipeForm/personalSpaceRecipeForm.php" method="POST">

        <legend>Nouvelle recette</legend>

        <div class="form-group">
            <label for="title" class="form-label mt-2">Titre de votre recette :</label>
            <input class="form-control" name="title" type="text" id="title">
        </div>

        <div class="form-group">
            <label for="persons" class="form-label mt-2">Nombre de personnes :</label>
            <input class="form-control" name="persons" type="number" id="persons" min="1" max="20">
        </div>

        <div class="form-group">
            <label for="time" class="form-label mt-2">Temps :</label>
            <input class="form-control" name="time" type="number" id="time" min="1" max="120">
        </div>

        <div class="form-group">
            <label for="ingredients" class="form-label mt-2">Ingredients :</label>
            <textarea class="form-control" name="ingredients" type="text" id="ingredients" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="recipe" class="form-label mt-2">Recette : </label>
            <textarea class="form-control" name="recipe" type="text" id="recipe" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="img" class="form-label mt-2">Image (Entrez l'adresse de votre image) : </label>
            <textarea class="form-control" name="image" type="text" id="img" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>

    </form>

</div>