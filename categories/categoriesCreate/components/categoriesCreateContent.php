<!-- Ici le formulaire pour créer une categorie -->
<div class="container mt-3">

    <form action="/PROJET%20PERSO/categories/categoriesForm/categoriesForm.php" method="POST">

        <legend>Créeer une categorie</legend>

        <div class="form-group">
            <label for="name" class="form-label mt-2">Nom :</label>
            <input class="form-control" name="name" type="text" id="name" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Créer categorie</button>

    </form>

</div>