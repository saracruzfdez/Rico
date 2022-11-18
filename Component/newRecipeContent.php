<!-- Ici le formulaire pour créer une nouvelle recette -->
<div class="container mb-3 mt-2">

    <form action="form.php" method="POST">

        <legend>Nouvelle recette</legend>

        <div class="form-group">
            <label for="title" class="form-label mt-2">Titre de votre recette :</label>
            <input class="form-control" name="title" type="text" id="title">
        </div>

        <div class="form-group">
            <label for="persons" class="form-label mt-2">Nombre de personnes :</label>
            <input class="form-control" name="persons" type="number" id="persons" min="1" max="2">
        </div>
        
        <div class="form-group">
            <label for="time" class="form-label mt-2">Temps :</label>
            <input class="form-control" name="time" type="number" id="time" min="1" max="3">
        </div>

        <div class="form-group">
            <label for="ingredients" class="form-label mt-2">Ingredients :</label>
            <textarea class="form-control" name="ingredients" type="text" id="ingredients" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="description" class="form-label mt-2">Descriptif : </label>
            <textarea class="form-control" name="description" type="text" id="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="formFile" class="form-label mt-2">Image :</label>
            <input class="form-control" type="file" id="formFile">
        </div>

        <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>

    </form>

</div>